<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function howTo()
    {
        return view('pages.how_to');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function whom()
    {
        return view('pages.whom');
    }

    public function subscriptions()
    {
        return view('pages.subscriptions');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
}
