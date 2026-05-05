<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSupplier;
use App\Models\DataCustomer;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSuppliers = DataSupplier::count();
        $totalCustomers = DataCustomer::count();

        return view('admin.dashboard', compact('totalSuppliers', 'totalCustomers'));
    }
}
