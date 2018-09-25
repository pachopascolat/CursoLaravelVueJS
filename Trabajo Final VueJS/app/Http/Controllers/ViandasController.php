<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViandasController extends Controller
{
    public function index()
    {
        return view('viandas.index');
    }

    public function edit()
    {
        return view('viandas.edit');
    }
}
