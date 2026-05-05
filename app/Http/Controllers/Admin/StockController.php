<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Production;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        // Get all products to calculate accurate summary counts
        $allCatalogs = Catalog::all();
        
        $totalProducts = $allCatalogs->count();
        $lowStockCount = 0;
        $availableCount = 0;
        $outOfStockCount = 0;

        // Calculate summary across all catalogs
        foreach ($allCatalogs as $c) {
            $stock = Production::where('product_name', $c->product_name)->sum('final_quantity');
            if ($stock > 0 && $stock < 50) {
                $lowStockCount++;
            } elseif ($stock >= 50) {
                $availableCount++;
            } else {
                $outOfStockCount++;
            }
        }

        // Paginate for the table
        $perPage = $request->input('per_page', 10);
        $catalogs = Catalog::paginate($perPage);

        // Attach stock info to the paginated items
        $catalogs->getCollection()->transform(function ($catalog) {
            $stock = Production::where('product_name', $catalog->product_name)->sum('final_quantity');
            $catalog->available_stock = $stock;
            
            if ($stock > 0 && $stock < 50) {
                $catalog->stock_status = 'Low Stock';
            } elseif ($stock >= 50) {
                $catalog->stock_status = 'Available';
            } else {
                $catalog->stock_status = 'Out of Stock';
            }
            
            return $catalog;
        });

        return view('admin.stocks.index', compact(
            'catalogs',
            'totalProducts',
            'lowStockCount',
            'availableCount',
            'outOfStockCount'
        ));
    }
}
