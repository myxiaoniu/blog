<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser()
    {
//        $resUser = DB::table('user')
//            ->where('id','>=',3)
//            ->get();
//        dd($resUser);
//        $resUser = DB::table('user')
//            ->whereRaw('id > ?  and user_age >= ?',[5,12])
//            ->get();
//        dd($resUser);
//        $resUser = DB::table('user')
//            ->pluck( 'user_pwd');
////            ->get();
//        dd($resUser);

//        $resUser = DB::table('user')->pluck('user_name','user_age');
//
//        dd($resUser);

//        $resUser = DB::table('user')->select('user_name','user_age')->get();
//        $resUser = DB::table('user')->select('user_name','user_pwd')->get();
//        DB::table('user')->chunk(2,function ($user){
//            dump($user);
//
//            return false;
//        });
//        User::chunk(4 , function ($user){
//           dd($user);
//        });
//        $user = new User();
//        $user->user_name = '小黑';
//        $user->user_pwd = md5('123qwe');
//        $user->user_age = 56;
//        $insert = $user->save();
//        dd($insert);

//        return view('user.checkcode');
        $user = DB::table('user')->where('user_name','李白')->get();
        dd($user);
    }

    public function code(Request $request)
    {
//        $checkCode = $request->validate(['code' => 'required|captcha',]);
//        if($checkCode){
//            return '成功';
//        }else{
//            return '失败';
//        }
        $code = $request->input();
//        dd($code);
//        $check = [
//            'code'=>'required|captcha'
//        ];
//        $res = $request->validate($check);
//        if($res){
//            return '成功';
//        }else{
//            return '失败';
//        }
//        $res = User::create(['user_name'=>'xiaoming', 'user_pass'=>234234 , 'user_phone'=>155432136234 , 'user_email'=>'123@123.com']);
//        if($res){
//            return 'success';
//        }else{
//            return 'false';
//        }

//        $id = 2;
//        $user = User::find(25);
//        dd($user);
//        $data = [
//            'user_name'=>'小明',
//            'pass'=>12346,
//            'age'=>23,
//            'eamil'=>'123@123.com'
//        ];
//        dd($data['user_name']);
//        $q = [42,43];
//        $res = User::where('user_name',"李白")->first();
//        if($res){
//            return 1;
//        }else{
//            return 2;
//        }
        $data = ['role_name'=>'产品经理'];
        $res = Role::create($data);
        if($res){
            return 1;
        }else{
            return 2;
        }


    }

    public function bibao()
    {
    }


}
