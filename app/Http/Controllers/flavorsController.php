<?php

namespace App\Http\Controllers;

use App\Models\flavors;

class flavorsController extends Controller
{
    public function index()
    {
        $flavors = flavors::all();

        return response()->json($flavors);
    }
}
