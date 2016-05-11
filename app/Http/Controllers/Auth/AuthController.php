<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Socialite;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'gender' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //armado para fijar el rol en user
        
        $user = new User([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'birthdate'=> $data['birthdate'],
            'gender'=> $data['gender'],
            'pais_id'=> $data['pais_id'],
            'photo_id'=> $data['photo_id'],           
            'provincia_id'=> $data['provincia_id'],
            'ciudad_id'=> $data['ciudad_id'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->role = 'user';
        $user->save();
        return $user;
    }
    
        /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return route('login');
    }
    
        /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {


        return route('home');
    }
    
    //Redefino:
    
    public function getRegister()
    {
        return view('auth.register');
    }
    
    
    /** SOCIAL MEDIA **/
    
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        
        dd($user);
        if($the_user = User::select()->where('email','=',$user->email()->first())){
            Auth::login($the_user);
        } else {
            $new_user = new User;
            $new_user->name = $user->user['name'];
            $new_user->lastname = $user->user['lastname'];
            $new_user->email = $user->email;
            $new_user->rol = 'user';
            $new_user->social = 1;
            $new_user->gender = $user->user['gender'];
            $new_user->save();
            Auth::login($new_user);
   
        }
        
        
        
        return redirect($this->redirectPath());

        // $user->token;
    }
}
