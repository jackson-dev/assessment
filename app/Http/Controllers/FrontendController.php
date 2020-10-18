<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function PlayCards() {
        return view('PlayCards');
    }

    public function SqlImprovement() {
        return view('SqlImprovement');
    }
}
