<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\validateLogin;
use App\Http\Requests\validateRegister;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $data = [];
        $data['messages'] = $request->session()->get('errLogin');
        $data['regisSuccess'] = $request->session()->get('regisSuccess');
        return view('admin.login.login',$data);
    }

    public function handleLogin(validateLogin $request,User $user)
    {
        $email = $request->txtEmail;
        $password = $request->txtPassword;

        $infoUser = $user->checkUserLogin($email, $password);

        if($infoUser){

            $request->session()->put('idSession', $infoUser['id']);
            $request->session()->put('userSession', $infoUser['username']);
            $request->session()->put('emailSession', $infoUser['email']);
            $request->session()->put('roleSession', $infoUser['role']);
            return redirect()->route('admin.dashboard');
        }else{
            $request->session()->flash('errLogin','Username or Password invalid');
            return redirect()->route('admin.login');
        }

    }

    public function handleLogout(Request $request)
    {
        $request->session()->forget('idSession');
        $request->session()->forget('userSession');
        $request->session()->forget('emailSession');
        $request->session()->forget('roleSession');
        return redirect()->route('admin.login');
    }

    public function register(Request $request)
    {
        $data = [];
        $data['messages'] = $request->session()->get('messages');
        $data['regisSuccess'] = $request->session()->get('regisSuccess');
        $data['regisError'] = $request->session()->get('regisError');
        return view('admin.register.register',$data);
    }

    public function handleRegister(validateRegister $request,User $user)
    {
        $username = $request->txtName;
        $password = $request->txtPassword;
        $email = $request->txtEmail;
        $fullname = $request->txtFName;
        $phone = $request->txtPhone;
        $gender = $request->gender;
        $age = $request->txtBirth;
        $address = $request->txtAddress;
        $repassword = $request->txtRePassword;

        $registerUser = [
            'username' => $username,
            'password' =>  md5($password),
            'email' => $email,
            'fullname' => $fullname,
            'phone' => $phone,
            'gender' => $gender,
            'age' => $age,
            'address' =>  $address,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];
        $confirmUser = $user->registerUser($registerUser);

        if($confirmUser){
            $request->session()->flash('regisSuccess','Tạo tài khoản thành công');
            return redirect()->route('admin.login');
        }else{
            $request->session()->flash('regisError', 'Tạo tài khoản chưa thành công');
            return redirect()->route('admin.register');
        }
    }
}
