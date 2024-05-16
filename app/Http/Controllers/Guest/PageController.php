<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;

class PageController extends Controller
{
    public function index(){
        $number_comics = Comic::count();

        return view('home', compact('number_comics'));
    }

    public function contacts(){
        return view('contacts');
    }
}
