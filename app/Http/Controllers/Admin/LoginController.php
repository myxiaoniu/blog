<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//use Ramsey\Uuid\Rfc4122\Validator;

//use Validator;
use Validator;

class LoginController extends Controller
{
    public function login()
    {

        return view('admin.login');
    }

    public function dologin(Request $request)
    {
        $data = $request->input();
//        file_put_contents('1.php', json_encode($data));
//        dump($data);
//        dd($data['user_pwd']);
//        die;


        $rules = [
            'code' => 'required|captcha',
        ];

        $msg = [
            'code.required' => '验证码不能为空',
            'code.captcha' => '验证码输入错误'
        ];
        $validator = Validator::make($data, $rules, $msg);
//        $validator = Validator::make($request->all(), [

        if($validator->fails()){
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where('user_name',$data['user_name'])->first();

        if(!$user){
            return redirect('admin/login')->withErrors(['此用户不存在!']);
        }
//        if($data['user_pwd']  != Crypt::decrypt($user->user_pass)){
//            return redirect('admin/login')->withErrors(['密码输入错误']);
//        }
        if($data['user_pwd'] != Crypt::decrypt($user->user_pass)){
            return redirect('admin/login')->withErrors(['密码输入错误']);
        }

        //将用户信息  存到session  中去
        session()->put('user',$user);

        return redirect('admin/index');
    }

    public function mima()
    {
        $pass = '123qwe';
        $crypt = Crypt::encrypt($pass);
//        return $crypt;
//        $str = '123456';
//        if($str != Crypt::decrypt($crypt)){
//            return '错误';
//        }else{
//            return '正确';
//        }
//        $name = 'admin';
//        $user = User::where('user_name',$name)->first();
//        $pwd = $user->user_pass;
//        if($pass != Crypt::decrypt($pwd)){
//            return '你真失败';
//        }
        $res = User::create(['user_name'=>'xiaoming', 'user_pass'=>'234234' , 'user_phone'=>'15543213623' , 'user_email'=>'123@123.com']);
        if($res){
            return 'success';
        }else{
            return 'false';
        }

    }
    public function loginout()
    {
        session()->flush();
        return redirect('admin/login');
    }


}
