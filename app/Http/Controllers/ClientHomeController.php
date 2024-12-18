<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    public function index()
    {
        $staffActionss = [
            [
                'name' => 'Manage Inventory',
                'description' => 'Add, update, or delete pharmacy products.',
                'route' => route('pharmacyStaff.inventory.index') // Corrected route for inventory
            ],
            [
                'name' => 'Medicinies',
                'description' => 'Add, update, or delete products',
                'route' => route('pharmacyStaff.medicines.index') // Corrected route for orders (you can replace this with actual order routes if any)
            ],
            [
                'name' => 'View Reports',
                'description' => 'Check monthly or weekly sales reports.',
                'route' => route('pharmacyStaff.reports.index') // Corrected route for reports
            ],
            [
                'name' => 'Manage Customers',
                'description' => 'Update customer details and their prescriptions.',
                'route' => route('clientso') // Corrected route for clients
            ],
        ];

        return view('home', compact('staffActionss')); // Use compact to pass the data
    }

    }
