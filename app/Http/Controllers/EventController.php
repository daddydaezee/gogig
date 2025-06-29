<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        // Show all upcoming (not ended yet) events by all organizers
        $events = Event::with('organizer')
            ->whereDate('end_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->role !== 'organizer') {
            abort(403, 'Only organizers can create events.');
        }
        return view('events.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'organizer') {
            abort(403, 'Only organizers can create events.');
        }

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'start_time'  => 'required',
            'end_time'    => 'required',
            'description' => 'nullable|string',
            'poster'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = new Event();
        $event->name = $validated['name'];
        $event->location = $validated['location'];
        $event->start_date = $validated['start_date'];
        $event->end_date = $validated['end_date'];
        $event->start_time = $validated['start_time'];
        $event->end_time = $validated['end_time'];
        $event->description = $validated['description'] ?? '';
        $event->organizer_id = $user->id;

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('event_posters', 'public');
            $event->poster = $path;
        }

        $event->save();

        return redirect()->route('events.show', $event->id)
            ->with('success', 'Event created successfully!');
    }

    public function show($id)
    {
        $event = Event::with(['organizer'])->findOrFail($id);

        $performers = $event->applications()
            ->where('status', 'approved')
            ->with('user.profile')
            ->get()
            ->map(fn($app) => $app->user);

        return view('events.show', [
            'event' => $event,
            'performers' => $performers,
        ]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $event = Event::findOrFail($id);

        if ($user->role !== 'organizer' || $event->organizer_id !== $user->id) {
            abort(403, 'You are not allowed to edit this event.');
        }

        return view('events.edit', compact('event'));
    }

    public function destroy($id)
    {
        $user = \Auth::user();
        $event = \App\Models\Event::findOrFail($id);

        // Only allow organizer who owns the event or admin to delete
        if ($user->role !== 'admin' && ($user->role !== 'organizer' || $event->organizer_id !== $user->id)) {
            abort(403, 'You are not allowed to delete this event.');
        }

        // Delete related applications if you want to keep data integrity
        $event->applications()->delete();

        // Delete event poster from storage if you want
        if ($event->poster && \Storage::disk('public')->exists($event->poster)) {
            \Storage::disk('public')->delete($event->poster);
        }

        $event->delete();

        return redirect()->route('dashboard')->with('success', 'Event deleted successfully!');
    }


    public function apply($eventId)
    {
        $user = auth()->user();
        $event = \App\Models\Event::findOrFail($eventId);

        // Prevent duplicate applications
        if ($user->applications()->where('event_id', $event->id)->exists()) {
            return redirect()->back()->with('info', 'You have already applied for this event.');
        }

        // Create new application
        $user->applications()->create([
            'event_id' => $event->id,
            // add other columns like 'status' if you want, or remove if not in DB
        ]);

        return redirect()->back()->with('success', 'Application submitted!');
    }
}
 