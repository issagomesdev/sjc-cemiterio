<?php

namespace App\Http\Controllers\Admin;
use App\Models\Cemiterio;

class HomeController
{
    public function index()
    {
        $cemiterio = Cemiterio::first();
        return view('home', compact('cemiterio'));
    }
}
