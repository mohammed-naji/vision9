<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form1()
    {
        return view('forms.form1');
    }

    public function form1_data(Request $request)
    {
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('name'));

        $name = $request->name;
        // $name = $request->input('name');
        // $name = $request->post('name');
        $email = $request->email;
        $age = $request->age;

        return "Welcome $name, your age is $age, your email is $email";

    }

    public function form2()
    {
        return view('forms.form2');
    }

    public function form2_data(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        return view('forms.form2_data', compact('name', 'email', 'message'));
    }

    public function form3()
    {
        return view('forms.form3');
    }

    public function form3_data(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required',
            'age' => 'required'
        ]);

        dd($request->all());

    }
}
