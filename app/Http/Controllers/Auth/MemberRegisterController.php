<?php

namespace App\Http\Controllers\Auth;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use App\Jobs\RegisterEmailJob;

class MemberRegisterController extends Controller
{
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:member,username',
            'email' => 'required|string|email|max:255|unique:member,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Member
     */
    protected function create(array $data)
    {
        $activation_code = bcrypt(date('Ymdhis').'your_key');
        return Member::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'activation_code' => $activation_code,
            'active' => 0
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $job = (new RegisterEmailJob($user))->onQueue('activation');
        dispatch($job);

        return view('auth.registered', compact('user'));


        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
    }

    /**
     * @method activate
     * @param $token
     */
    public function activation($token)
    {
        $member = Member::where('activation_code', $code)->first();
        if ($member != null) {
            $member->active = 1;
            if ($member->save()) {
                return view('auth.anggota.activated', compact('member'));
            }            
        } else {
            abort(401);
        }

    }
}
