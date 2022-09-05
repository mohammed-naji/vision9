<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index()
    {
        // return 'index page';
        // return view('index.php');
        $name = 'Amal';
        $desc = 'Updated Content';
        // return view('index')->with('name', $name)->with('desc', $desc);
        return view('index', compact('name', 'desc'));
        // return view('index', ['ddddddd' => $name, 'eeeeeee' => $desc]);
    }

    public function about()
    {
        return 'about page';
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_data()
    {
        return 'fff';
    }

    public function post($id = null)
    {
        return 'News ' . $id;
    }
}
