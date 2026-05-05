<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::orderBy('created_at', 'desc')->paginate(12);
        return view('customer.catalogs.index', compact('catalogs'));
    }

    public function show(Catalog $catalog)
    {
        return view('customer.catalogs.show', compact('catalog'));
    }
}
