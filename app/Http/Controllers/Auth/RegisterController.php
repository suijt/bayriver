<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Models\Company;
use App\Modules\Models\User\User;
use App\Modules\Service\CompanyService;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $company;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CompanyService $company)
    {
        $this->company = $company;
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            // 'phone_number' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'max:10000', 'mimes:jpg,jpeg,png,svg,webm']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Modules\Models\User\User
     */
    protected function create(array $data, $file)
    {
        // dd($file);
        $user = User::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'status' => 'active'
        ]);

        if ($company = $this->company->registerCompany($data, $user->id)) {
            $this->uploadFile($file, $company);
        }

        $user->assignRole(['company']);
        return $user;
    }

    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all(), $request->file())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('success', 'company has been registered. Check your email address for verification.');
    }


    function uploadFile($file, $company)
    {
        $file     = $file['logo'];
        $fileName = $this->company->uploadFile($file);
        if (!empty($company->image)) {
            $this->company->__deleteImages($company);
        }

        $data['logo'] = $fileName;
        $this->company->updateImage($company->id, $data);
    }
}
