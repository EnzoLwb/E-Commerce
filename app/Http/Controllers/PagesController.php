<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    /*
     * PagesController 处理所有自定义页面的逻辑 */

    /*
     * 首页展示
     */
    public function root()
    {
        return view('pages.root');
    }

    //返回重新发送邮件的视图
    public function emailVerificationRequired(){
        return view('pages.edit_email_notify');
    }

    //确定重新发送验证邮件
    public function sendVerificationMail(){
        $user= Auth::user();
        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到您的注册邮箱上，请注意查收。');
        return redirect('/');
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'pages.email_verification';
        $data = compact('user');
        $to = $user->email;
        $subject = "感谢注册 Enzo，请验证邮箱";

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });

    }

    public function verifiedEmail($token){
        $user = User::where('verification_token',$token)->first();
        $user->verified = true;
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->verification_token = null;
        $user->save();
        Auth::login($user);
        session()->flash('success_mail', '恭喜您，邮箱验证成功！');
        return redirect('/');
    }
}
