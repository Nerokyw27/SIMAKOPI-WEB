<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Production;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::orderBy('production_date', 'desc')->paginate(10);
        $totalProduction = Production::count();
        $inProgress = Production::where('production_status', 'In Progress')->count();
        $completed = Production::where('production_status', 'Completed')->count();
        $failed = Production::where('production_status', 'Failed')->count();

        return view('admin.productions.index', compact('productions', 'totalProduction', 'inProgress', 'completed', 'failed'));
    }

    public function create()
    {
        return view('admin.productions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:25',
            'production_date' => 'required|date',
            'stock_in' => 'required|integer|min:0',
            'production_status' => 'required|in:In Progress,Completed,Failed',
        ]);

        Production::create([
            'product_name' => $request->product_name,
            'production_date' => $request->production_date,
            'stock_in' => $request->stock_in,
            'final_quantity' => 0,
            'production_status' => $request->production_status,
        ]);

        return redirect()->route('admin.productions.index')->with('success', 'Production data has been successfully added.');
    }

    public function edit(Production $production)
    {
        return view('admin.productions.edit', compact('production'));
    }

    public function update(Request $request, Production $production)
    {
        $rules = [
            'product_name' => 'required|string|max:25',
            'production_date' => 'required|date',
            'stock_in' => 'required|integer|min:0',
            'production_status' => 'required|in:In Progress,Completed,Failed',
        ];

        // Only allow updating final_quantity if the status is changing to or is already Completed
        if ($request->production_status === 'Completed') {
            $rules['final_quantity'] = 'required|integer|min:0';
        }

        $request->validate($rules);

        $production->update([
            'product_name' => $request->product_name,
            'production_date' => $request->production_date,
            'stock_in' => $request->stock_in,
            'production_status' => $request->production_status,
            'final_quantity' => $request->production_status === 'Completed' ? $request->final_quantity : $production->final_quantity,
        ]);

        return redirect()->route('admin.productions.index')->with('success', 'Production data has been successfully updated.');
    }

    public function destroy(Production $production)
    {
        $production->delete();

        return redirect()->route('admin.productions.index')->with('success', 'Production data has been successfully deleted.');
    }
}
