<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function destroy(Request $request)
    {

    }

    public function update(Request $request)
    {

    }
}
