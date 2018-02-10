<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SocialAuth;

class SocialController extends Controller
{
    public function auth($provider){
        return SocialAuth::authorize($provider);
    }

    public function redirect($provider){
        SocialAuth::login($provider, function($user, $details) {
            $user->name = $details->nickname;
            $user->email = $details->email;
            $user->avatar = $details->avatar;
            $user->save();
        });

        return redirect('/forum');
    }
}
