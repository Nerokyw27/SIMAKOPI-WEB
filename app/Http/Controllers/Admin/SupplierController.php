<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DataSupplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display list of suppliers from m_data_supplier.
     */
    public function index()
    {
        $suppliers = DataSupplier::latest()->get();
        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show create supplier form.
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a new supplier account.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:25|unique:m_data_supplier,username',
            'password' => 'required|string|min:6',
        ]);

        // Create account in m_data_akun
        $akun = User::create([
            'full_name' => $request->username,
            'username' => $request->username,
            'email' => $request->username . '@supplier.simakopi.com',
            'password' => $request->password,
            'role' => 'supplier',
        ]);

        // Create entry in m_data_supplier
        DataSupplier::create([
            'supplier_name' => $request->username,
            'username' => $request->username,
            'password' => $request->password,
            'akun_id' => $akun->id,
        ]);

        return redirect()->route('admin.suppliers.index')->with('toast', [
            'type' => 'success',
            'message' => 'Supplier data has been successfully added',
        ]);
    }

    /**
     * Display supplier detail.
     */
    public function show(DataSupplier $supplier)
    {
        $supplier->load('akun');
        return view('admin.suppliers.show', compact('supplier'));
    }
}
