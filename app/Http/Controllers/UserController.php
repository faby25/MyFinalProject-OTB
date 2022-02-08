<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\db;
use Illuminate\Support\Facades\Hash;
use CreateUsersTable;

class UserController extends Controller
{
    public function index()
    {
        $datos ['users'] = User::where("is_admin","=",0)->paginate();
        return view('user.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$roles=Role::pluck('name','name')->all();
        //return view('user.create',compact('roles'));
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosuser = request()->except(['_token','roles']);
        $users = User::create ($datosuser);
       
        //User::insert($datosuser);
       //$users->roles()->sync($request->roles);
       // return $datosuser; 
           
        return redirect('user');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tmulta  $tmulta
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tmulta  $tmulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tmulta  $tmulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $datosmulta = request()->except(['_token','_method']);
            user::where('id','=',$id)->update($datosmulta);

            $user=User::findOrFail($id);
            return view('user.edit', compact('user'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tmulta  $tmulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::destroy($id);
        return redirect('user');
    }
}
