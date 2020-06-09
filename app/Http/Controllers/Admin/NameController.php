<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索框内的内容
//        $input = $request->all();
//        dd($input);

        $user = User::orderBy('user_id','asc')
            ->where(function ($query) use($request){
                $user_name = $request->input('username');
                if(!empty($user_name)){
                    $query->where('user_name','like','%'.$user_name.'%');
                }

            })
            ->paginate($request->input('num')?$request->input('num'):6);

        $count = User::count();

//        $user = User::paginate(6);

        return view('admin.user.list'  , compact('user' , 'request' , 'count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return 11111;

        $input = $request->all();
//        dd($input);
//        die;
//        dd($input);
//        die;
//        dd($request->all());
//        die;

        $user_name = $input['username'];
//        dd($user_name);
//        die;
        $user_phone = $input['userphone'];
        $user_email = $input['useremail'];
        $user_pass = Crypt::encrypt($input['userpass']);


        $res = User::create(['user_name'=>$user_name, 'user_pass'=>$user_pass , 'user_phone'=>$user_phone , 'user_email'=>$user_email]);
        if($res){
            $data = [
                'status'=> 0,
                'message'=>"添加成功"
            ];
        }else{
            $data = [
                'status'=> 1,
                'message'=>"添加失败"
            ];
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
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
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
//        return 11111;
        $da = $request->input();
        $user = User::find($id);

        if($user->user_name == $da['username']){
            $data = [
                'status'=>1 , //修改用户名重复；
                'message'=> ' 此用户已存在',
            ];
        }else{
            $user->user_name = $da['username'];
            $user->user_pass = Crypt::encrypt($da['repass']) ;
            $user->user_phone = $da['phone'];
            $user->user_email = $da['email'];

            $res = $user->save();
            if($res){
                $data = [
                    'status'=>2,
                    'message'=>'用户修改成功'
                ];
            }else{
                $data = [
                    'status'=>3,
                    'message'=>'用户修改失败'
                ];
            }
        }
        return $data;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $res = $user->delete();
        if($res){
            $data = [
                'status'=>1,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>0,
                'message'=>'删除失败'
            ];
        }
        return $data;

    }
    public function del(Request $request)
    {
        $input = $request->input('ids');

        $res = User::destroy($input);

        if($res){
            $data = [
                'status'=>1,
                'message'=>'用户批量删除成功'
            ];
        }else{
            $data = [
                'status'=>0,
                'message'=>'用户批量删除失败'
            ];
        }
        return $data;
    }

}
