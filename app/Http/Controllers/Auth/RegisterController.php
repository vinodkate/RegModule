<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Client;

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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'digits:10'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:6', 'max:12','confirmed'],
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'password' => Hash::make($data['password']),
        ]);

        return $this->smartyStreetAPICall($user);
   
    }

    /**
    * Smarty Street API Call
    */
    protected function smartyStreetAPICall($user)
    {

        $client = new Client(['base_uri' => 'https://us-street.api.smartystreets.com/']);
        $response = $client->request('GET', 'street-address?auth-id='.env('SMARTYSTREET_AUTH_ID').'&auth-token='.env('SMARTYSTREET_AUTH_TOKEN').'&street='.$user->address.'&street2=&city='.$user->city.'&state='.$user->state.'&zipcode=&candidates=10&match=invalid');
        $data = json_decode($response->getBody(), true);
      
        $user->county = isset($data[0]['metadata']['county_name']) ? $data[0]['metadata']['county_name'] : NULL; 
        $user->save();

        return $user;

    }
}
