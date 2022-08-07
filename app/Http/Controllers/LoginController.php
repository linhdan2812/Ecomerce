<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('client.home'));
    }

    //Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    //Google callback
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        $this->createOrUpdateUser($user,'google');

        if(Str::endsWith($user->email, '@gmail.com') =='true'){
            $this->createOrUpdateUser($user,'google');
            if(Auth::user()->role === 'user'){
                return redirect()->route('client.home');
            }
        }
        if(Str::endsWith($user->email, '@gmail.com') =='true'){
            $this->createOrUpdateUser($user,'google');
            if(Auth::user()->role === 'admin'){
                return redirect()->route('admin.dashboard');
            }
        }
        else{
            return redirect()->route('login')->with('msg1','Tài khoản Google không hợp lệ');
        }
    }

    private function createOrUpdateUser($data,$provider){
        $user = User::where('email',$data->email)->first();
        // $last_login = Carbon::now();

        if($user){
            $user->update([
                'provider' => $provider,
                'provider_id' => $data->id,
                'photo' => $data->avatar,
                // 'last_login' => $last_login
            ]);
        }else{
            if(Str::endsWith($data->email, '@gmail.com')=='true'){
                $user = User::create([
                    'name' => $data->name,
                    'email' => $data->email,
                    'provider' => $provider,
                    'provider_id' => $data->id,
                    'photo' => $data->avatar,
                    // 'last_login' => $last_login,
                    'role' => 'user',
                ]);
            }
            // if(Str::endsWith($data->email, '@fpt.edu.vn')=='true'){
            //     $user = User::create([
            //         'name' => $data->name,
            //         'email' => $data->email,
            //         'provider' => $provider,
            //         'provider_id' => $data->id,
            //         'avatar' => $data->avatar,
            //         'last_login' => $last_login,
            //         'role' => 'TT',
            //     ]);
            // }
             else{
                return redirect(route('login'));
            }
        }
        Auth::login($user);
    }
}
