<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function TiengViet()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language','tiengViet');
        return redirect()->back();
    }
    public function Japan()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language','japan');
        return redirect()->back();
    }
}
