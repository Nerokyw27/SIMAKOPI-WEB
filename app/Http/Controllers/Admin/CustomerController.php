<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataCustomer;

class CustomerController extends Controller
{
    /**
     * Display list of customers from m_data_customer.
     */
    public function index()
    {
        $customers = DataCustomer::latest()->get();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Display customer detail.
     */
    public function show(DataCustomer $customer)
    {
        $customer->load('akun');
        return view('admin.customers.show', compact('customer'));
    }
}
