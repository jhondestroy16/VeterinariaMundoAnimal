<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:panel');
    }

    public function index()
    {
        return view('panel');
    }
}
