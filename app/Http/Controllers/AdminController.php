<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SponsorRequest;

class AdminController extends Controller
{
    // Only for Admin
    private function isAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Admin only.');
        }
    }

    public function organizerList()
    {
        $this->isAdmin();
        $organizers = User::where('role', 'organizer')->get();
        return view('admin.organizers', compact('organizers'));
    }

    public function sponsorRequests()
    {
        $this->isAdmin();
        $requests = SponsorRequest::where('status', 'pending')->get();
        return view('admin.sponsor_requests', compact('requests'));
    }

    public function approveSponsorRequest($id)
    {
        $this->isAdmin();
        $request = SponsorRequest::findOrFail($id);
        $request->status = 'approved';
        $request->save();
        return back()->with('success', 'Sponsor request approved!');
    }

    public function rejectSponsorRequest($id)
    {
        $this->isAdmin();
        $request = SponsorRequest::findOrFail($id);
        $request->status = 'rejected';
        $request->save();
        return back()->with('success', 'Sponsor request rejected!');
    }
}
