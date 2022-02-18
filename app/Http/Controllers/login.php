<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\SessionGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use League\OAuth1\Client\Server\Twitter;

class login extends Controller
{
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
//        dd($user);
        $findUser = User::where('email', $user->email)->first();
        if ($findUser){
            Auth::attempt(['email'=>$findUser->email, 'password'=>'shopnow'], false);
            //dd(Hash::check('shopnow', $findUser->password));
            //dd($x);
            return redirect(route('register'));
        }else{
            $newUser = User::create([
               'name' => $user->name,
               'avatar' => $user->avatar,
               'email' => $user->email,
               'password' => Hash::make('shopnow'),
               'social_network' => 'GOOGLE',
            ]);
            Auth::login($newUser);
        }
        return redirect(route('home'));
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $findUser = User::where('email', $user->email)->first();

        if ($findUser){
            Auth::login($findUser);
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'avatar' => $user->avatar,
                'email' => $user->email,
                'social_network' => 'FACEBOOK',
            ]);
            Auth::login($newUser);
        }
        return redirect(route('home'));
    }

    public function twitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallback(Request $request)
    {
        //        array:2 [▼
        //  "oauth_token" => "fPhRaAAAAAABSSGVAAABewgX624"
        //  "oauth_verifier" => "TcNBYJsuUhKpBBbinqk8XnNiIsTZ7CUC"
        //]
        $token = 'AAAAAAAAAAAAAAAAAAAAAJUhSQEAAAAA8%2FPDnFIj6HVlamJZNHkNytYi8%2FI%3DMVppYpgGa0FxxBSzhunWMV7VbxInfNuzLhgJ1TyPKQNCFY06Ti';
        $secret = 'EFIR0RqkHFuSu9kxmDo9brvB7QXF0dgDsvprj42i7hMfiRuy3r';
        //$user = Socialite::driver('twitter')->userFromTokenAndSecret($request->oauth_token, $request->oauth_verifier);
        //$user = Socialite::driver('twitter')->userFromTokenAndSecret('AAAAAAAAAAAAAAAAAAAAAJUhSQEAAAAA', $request->oauth_verifier);
        //$user = Socialite::driver('twitter')->user();
        //dd($user);
        //dd($request['oauth_token']);
    }

    public function linkedin()
    {
        return Socialite::driver('linkedin')->redirect();
        //return Socialite::driver('linkedin')->scopes(['r_liteprofile', 'r_emailaddress'])->redirect();
    }

    public function linkedinCallback()
    {
        $user = Socialite::driver('linkedin')->stateless()->user();

        $findUser = User::where('email', $user->email)->first();

        if ($findUser){
            Auth::login($findUser);
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'avatar' => $user->avatar,
                'email' => $user->email,
                'social_network' => 'LINKEDIN',
            ]);
            Auth::login($newUser);
        }
        return redirect(route('home'));
    }

}
