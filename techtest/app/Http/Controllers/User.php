<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    public function index() {
        if (session()->has('tokenApi')) {
            $response = Http::GET('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/'.session()->get('userId'), [
                'token' => session()->get('tokenApi'),
            ]);
            // return $response;
            return view('user', [
                "title" => "USER",
                "datas" => $response,
            ]);
        }
        return redirect('/login');
    }
    public function edit($id) {
        if (session()->has('tokenApi')) {
            $response = Http::GET('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/'.$id, [
                'token' => session()->get('tokenApi'),
            ]);

            return view('user_edit', [
                "title" => "USER EDIT",
                "datas" => $response,
                "last_id" => $id
            ]);
        }

        return redirect('/login');
    }

    public function login() {
        if (session()->has('tokenApi')) {
            return redirect('/dashboard');
        }
        return view("login.index", [
            'title' => 'LOGIN',
        ]);
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/login');
    }

    public function register() {
        if (session()->has('tokenApi')) {
            return redirect('/dashboard');
        }
        return view("login.register", [
            'title' => 'REGISTER',
        ]);
    }

    public function editUser(Request $request) {
        $response = Http::PUT('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/'.$request->id, [
            'firstName'         => $request->firstName,
            'lastName'          => $request->lastName,
            'email'             => $request->email,
            'token'             => session()->get('tokenApi'),
        ]);
        $id_new = $request->id;

        $request->session()->flash('success', 'Edit User Success');
        return redirect('/user');        
    }
    public function add(Request $request) {
        if ($request->firstName != '') {
            $validated = $request->validate([
                'firstName'         => 'required',
                'lastName'          => 'required',
                'email'             => 'required',
                'password'          => 'required',
                'repeatPassword'    => 'required'
            ]);

            $response = Http::POST('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users', [
                'firstName'         => $request->firstName,
                'lastName'          => $request->lastName,
                'email'             => $request->email,
                'password'          => $request->password,
                'repeatPassword'    => $request->repeatPassword,
            ]);
            $id_new = $request->id;

            $request->session()->flash('success', 'Regisration Successfull! Please Login');
            return redirect('/login');
        } else {
            $credentials = $request->validate([
                'email'             => 'required',
                'password'          => 'required',
            ]);

            $response = Http::POST('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/login', [
                'email'             => $request->email,
                'password'          => $request->password,
            ]);

            if (isset($response['errors'])) {
                return back()->with('loginError', 'Login Failed!');
            } else {
                $request->session()->regenerate();
                $request->session()->put('tokenApi', $response['token']);
                $request->session()->put('userId', $response['id']);
                return redirect()->intended('/dashboard');
            }

        }
    }
}
