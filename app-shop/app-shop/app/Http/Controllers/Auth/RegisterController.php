<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cc' => 'required|integer|unique:users|min:8',
            'tel_1' => 'required|integer',
            'city' => 'required|string|min:4',
            'address' => 'required|string|min:4',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

      
       
            $user=new User();
            $user->name= $data['name'];
            $user->email = $data['email'];
            $user->password= Hash::make($data['password']);
            $user->cc = $data['cc'];
            $user->tel_1 = $data['tel_1'];
            $user->tel_2 = $data['tel_2'];
            $user->city = $data['city'];
            $user->address = $data['address'];
            $user->save();

            //si la variable categorias esta definida dentro del array data
            if (isset($data['categorias'])) {
                $categorias=$data['categorias'];
               foreach ($categorias as $categoria) {
                $category=Category::find($categoria);
                $user->categorys()->save($category);
            }
            }
                
        return $user;
    }


}
