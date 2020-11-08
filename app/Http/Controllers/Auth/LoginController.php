<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Hash;
use App\User;
use Str;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    



    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function githubRedirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function githubHandleProviderCallback()
    {
        $socialUser = Socialite::driver('github')->user();

        $findUser=User::where('email',$socialUser->email)->first();

        if($findUser){
            Auth::login($findUser,true);

            return redirect('/');
        }else{
            $user=User::firstOrCreate([
                'username'=> $socialUser->nickname,
                'name'=> $socialUser->name,
                'email'=> $socialUser->email,
                'password'=> Hash::make(Str::random(24))
                
            ]);
    
            Auth::login($user,true);
    
            return redirect('/');

        }


       

    }


    
    // Redirect the user to the Facebook authentication page.

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function googleCallback(){
        $socialUser = Socialite::driver('google')->user();

        $findUser=User::where('email',$socialUser->email)->first();

        if($findUser){
            Auth::login($findUser,true);

            return redirect('/');
        }else{
            $user=User::firstOrCreate([
                'username'=> $socialUser->user['given_name'],
                'name'=> $socialUser->name,
                'email'=> $socialUser->email,
                'password'=> Hash::make(Str::random(24))
                
            ]);
    
            Auth::login($user,true);
    
            return redirect('/');

        }


    }


}
