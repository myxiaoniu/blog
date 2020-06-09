<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //授权
    public function auth($id)
    {
        $role = Role::find($id);
        $permission = Permission::all();
        $res = 243;
//        dd($role);
        return view('admin.role.auth',compact('role' , 'permission'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();

        return view('admin.role.list' , compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input('rolename');
//        dd($input);
        $role = Role::where('role_name',$input)->first();
        if($role){
            $data = [
                'status'=>0,
                'message'=>'此角色已存在'
            ];
        }else{
            $res = Role::create(['role_name'=>$input]);
            if($res){
                $data = [
                    'status'=>1,
                    'message'=>'角色添加成功'
                ];
            }else{
                $data = [
                    'status'=>2,
                    'message'=>'角色添加失败'
                ];
            }
        }
        return $data;




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
