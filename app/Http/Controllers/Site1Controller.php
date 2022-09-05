<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site1Controller extends Controller
{
    public function index()
    {
        $title = 'First Website';
        $content = 'Graphic Artist - Web Designer - Illustrator';

        return view('site1.index', compact('title', 'content'));
    }
}
