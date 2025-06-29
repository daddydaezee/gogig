<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\SponsorRequest; // Use your actual model

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            // Show all events (most recent first) for admin
            $events = Event::with('organizer')
                ->orderBy('start_date', 'desc')
                ->get();

            // Pending sponsor requests
            $pendingSponsorRequests = SponsorRequest::where('status', 'pending')
                ->with(['event.organizer', 'sponsor'])
                ->get();

            $totalUsers = \App\Models\User::count();
            $totalEvents = Event::count();
            $approvalsPending = $pendingSponsorRequests->count();

            return view('dashboard.admin', [
                'user' => $user,
                'events' => $events,
                'pendingSponsorRequests' => $pendingSponsorRequests,
                'totalUsers' => $totalUsers,
                'totalEvents' => $totalEvents,
                'approvalsPending' => $approvalsPending,
            ]);
        }

        if ($user->role === 'organizer') {
            // 1. Fetch all events created by this organizer
            $myEvents = Event::where('organizer_id', $user->id)
                ->orderBy('start_date', 'desc')
                ->get();

            // 2. Fetch all performer applications to these events
            $myApplications = \App\Models\Application::whereHas('event', function($query) use ($user) {
                    $query->where('organizer_id', $user->id);
                })
                ->with(['event', 'user.profile'])
                ->latest()
                ->get();

            return view('dashboard.organizer', [
                'user' => $user,
                'myEvents' => $myEvents,
                'myApplications' => $myApplications,
            ]);
        }


        // Performer logic
        $appliedApps = $user->applications()->with('event')->get();
        $appliedEvents = $appliedApps->filter(fn($app) => $app->event);
        $appliedEventIds = $appliedEvents->pluck('event.id')->all();

        // Upcoming events: just show not-ended events performer hasn't applied to yet
        $upcomingEvents = Event::whereDate('start_date', '>=', now())
            ->whereNotIn('id', $appliedEventIds)
            ->orderBy('start_date')
            ->limit(3)
            ->get();

        return view('dashboard.performer', [
            'user' => $user,
            'appliedEvents' => $appliedEvents,
            'upcomingEvents' => $upcomingEvents,
        ]);
    }

    public function admin()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            abort(403, 'Admins only!');
        }
        // Optionally pass the same data as above if needed
        return view('dashboard.admin', compact('user'));
    }
}
