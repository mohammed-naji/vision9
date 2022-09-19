<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactUsMail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Util\Test;

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
        // $name = $request->name;
        // $email = $request->email;
        // $message = $request->message;

        Mail::to('admin@example.com')->send(new ContactUsMail($request->except('_token')));



        // return view('forms.form2_data', compact('name', 'email', 'message'));
    }

    public function form3()
    {
        return view('forms.form3');
    }

    public function form3_data(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|min:2',
        //     'email' => 'required',
        //     'age' => 'required|numeric|gt:18|lt:100'
        // ]);

        $rules = [];
        foreach($request->all() as $key => $value) {
            $rules[$key] = 'required';
        }
        $request->validate($rules);

        $name = htmlspecialchars( $request->name );

        dd($request->all());

    }

    public function form4()
    {
        return view('forms.form4');
    }

    public function form4_data(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png', 'max:100']
        ]);

        $name = rand().time().$request->file('image')->getClientOriginalName();
        // a.png => 654489726465a.png
        // 669879656546_646132133113_67978232136465_n.jpg
        // $ex = $request->file('image')->getClientOriginalExtension();
        // $name = rand().'_'.rand().rand().'_'.rand().'_n.'.$ex;
        // ee.png => 89766546_54265485563254789655_55454460_n.png
        $request->file('image')->move(public_path('uploads'), $name);
    }

    public function full_form()
    {
        return view('forms.full_form');
    }

    public function full_form_data(Request $request)
    {

        dd($request->all());

        $request->validate([
            'name' => 'required|min:3|max:50'
        ]);


        return view('forms.full_form');
    }

    public function contact_us()
    {
        return view('forms.contact_us');
    }

    public function contact_us_data(Request $request)
    {

        $imgname = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $imgname);
        $data = $request->except('_token');
        $data['image'] = $imgname;
        // dd($data);

        Mail::to('tareqsourani01@gmail.com')->send(new ContactMail($data));
    }
}
