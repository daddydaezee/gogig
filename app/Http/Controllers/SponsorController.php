<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    // PUBLIC or any logged in user
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('sponsors.index', compact('sponsors'));
    }
}
