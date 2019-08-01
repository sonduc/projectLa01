<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Hash;

use Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
    	return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
    	
    	// $user = Socialite::driver('google')->user();
    	$user = Socialite::driver('google')->user();
    
 		// $token = $user->token;



    	$data=array();
    	//$data['googleId']=$user->getId();
    	$data['name']=$user->getName();
    	$data['email']=$user->getEmail();
    	$data['password']=Hash::make($user->token);

    	$u=User::where('email',$data['email'])->first();
    	if (isset($u)) {
    		Auth::login($u);
    	}else{
    		$u=User::create($data);
    		Auth::login($u);
    	}
    	
    	//Auth::gurad('admin')->login($a);

    	// Auth::loginUsingId($a->id);
    	return redirect()->route('blog.index');
    }
}
