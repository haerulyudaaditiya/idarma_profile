<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Position;
use App\Models\User;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', 'user')->count();
        $totalPositions = Position::count();
        $positionsFilled = Organization::count();
        $positionsVacant = Position::doesntHave('organization')->count();
        $totalContacts = Contact::count();
        $recentContacts = Contact::where('created_at', '>=', now()->subDays(7))->count();

        return view('pages.dashboard', compact(
            'totalAdmins',
            'totalRegularUsers',
            'totalPositions',
            'positionsFilled',
            'positionsVacant',
            'totalContacts',
            'recentContacts',
        ));
    }
}
