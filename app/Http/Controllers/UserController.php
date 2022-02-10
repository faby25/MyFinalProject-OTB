<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\db;
use CreateUsersTable;

use Illuminate\Support\Facades\Validator;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Register user
     * @param request
     * @return response
     */
    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    /**
     * Login page
     * @param NA
     * @return view
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * User Login
     * @param request
     * @return response
     */
    public function loginValidate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return back()->with('success', 'Success! You are logged in');
            }
            return back()->with('failed', 'Failed! Invalid password');
        }
        return back()->with('failed', 'Failed! Invalid email');
    }

    /**
     * Forgot password
     * @param NA
     * @return view
     */
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Validate token for forgot password
     * @param token
     * @return view
     */
    public function forgotPasswordValidate($token)
    {
        $user = User::where('token', $token)->where('is_verified', 0)->first();
        if ($user) {
            $email = $user->email;
            return view('auth.change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('failed', 'Password reset link is expired');
    }

    /**
     * Reset password
     * @param request
     * @return response
     */
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('failed', 'Failed! email is not registered.');
        }

        $token = Str::random(60);

        $user['token'] = $token;
        $user['is_verified'] = 0;
        $user->save();

        Mail::to($request->email)->send(new ResetPassword($user->name, $token));

        if(Mail::failures() != 0) {
            return back()->with('success', 'Success! password reset link has been sent to your email');
        }
        return back()->with('failed', 'Failed! there is some issue with email provider');
    }

    /**
     * Change password
     * @param request
     * @return response
     */
    public function updatePassword(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['is_verified'] = 0;
            $user['token'] = '';
            $user['password'] = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Success! password has been changed');
        }
        return redirect()->route('forgot-password')->with('failed', 'Failed! something went wrong');
    }




    public function index()
    {
        $datos ['users'] = User::where("is_admin","=",0)->paginate();
        return view('user.index',$datos);
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $datosuser = request()->except(['_token','roles']);
        $users = User::create ($datosuser);
        return redirect('user');
    }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
            $datosmulta = request()->except(['_token','_method']);
            user::where('id','=',$id)->update($datosmulta);
            $user=User::findOrFail($id);
            return view('user.edit', compact('user'));
    }
    public function destroy($id)
    {
        user::destroy($id);
        return redirect('user');
    }
}
