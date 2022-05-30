<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $langs = Language::all();
        $countries = Country::all();

        return view('test', compact('langs', 'countries'));
    }

    public function flags($id)
    {
        $flags= Country::where('id', $id)->pluck('code', 'id');
        return $flags;
    }
}
