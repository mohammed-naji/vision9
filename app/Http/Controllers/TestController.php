<?php

namespace App\Http\Controllers;

class TestController
{
    function welcome() {
        $name = 'ali';
        $age = 20;
        $username = 'ali18';

        // route('contact');

        // $url = url('/welcome/'.$name.'/'.$age.'/'.$username.'/news/aa/rrrr');
        $url = route('welcome', [$name, $age, $username]);

        // return $url;

        return "To  See Welcome Message <a href='$url'>Click Here</a>";
    }

    public function about()
    {
        // return 'About Us Page';
        // return view('about');
    }
}
