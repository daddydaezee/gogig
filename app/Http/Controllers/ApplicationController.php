<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Event;

class ApplicationController extends Controller
{
    // ORGANIZER or ADMIN - List applications for an event
    public function listForEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        if (!in_array(auth()->user()->role, ['organizer', 'admin'])) {
            abort(403, 'Unauthorized.');
        }
        if (auth()->user()->role == 'organizer' && $event->organizer_id != auth()->id()) {
            abort(403, 'You can only view applications for your own events.');
        }
        $applications = $event->applications;
        return view('applications.list', compact('event', 'applications'));
    }

    // ORGANIZER/ADMIN - Approve application
    public function approve($applicationId)
    {
        $app = Application::findOrFail($applicationId);
        $event = $app->event;
        if (!in_array(auth()->user()->role, ['organizer', 'admin'])) {
            abort(403, 'Unauthorized.');
        }
        if (auth()->user()->role == 'organizer' && $event->organizer_id != auth()->id()) {
            abort(403, 'You can only approve applications for your own events.');
        }
        $app->status = 'approved';
        $app->save();
        return back()->with('success', 'Application approved!');
    }

    // ORGANIZER/ADMIN - Reject application
    public function reject($applicationId)
    {
        $app = Application::findOrFail($applicationId);
        $event = $app->event;
        if (!in_array(auth()->user()->role, ['organizer', 'admin'])) {
            abort(403, 'Unauthorized.');
        }
        if (auth()->user()->role == 'organizer' && $event->organizer_id != auth()->id()) {
            abort(403, 'You can only reject applications for your own events.');
        }
        $app->status = 'rejected';
        $app->save();
        return back()->with('success', 'Application rejected!');
    }
}
