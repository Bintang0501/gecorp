<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockBarangController extends Controller
{
    public function index()
    {
    return view('master.stockbarang.index');
    }

    public function create()
    {
        return view('master.stockbarang.create');
    }

}
