<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Usersinfo;
use Hash;
use Mail;
use DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->input('upass')!=$request->input('repass')){
            echo "<script>alert('两次密码不一致');location.href='/home/register'</script>";
        }
        $users = new users;
        $users->email = $request->input('email','');
        $users->uname = $request->input('email','');
        $users->token = str_random(30);
        $users->upass = Hash::make($request->input('upass',''));
        $uid =  $users->id;
        
        if($users->save()){
            $uid = $users->id;
            $userinfo = new Usersinfo;
            $userinfo->uid = $uid;

            $userinfo->profile = '20190726/a1wthG6a6oepzqa3SWp5FqTSXXz5pvCLNR6ILP4T.jpeg';
            if($userinfo->save()){
                //发送邮件
                Mail::send('home.email.email',['id'=>$users->id,'token'=>$users->token],function($m) use ($users){
                    $m->to($users->email)->subject('your reminder');
                });
            }
            echo '添加成功';
        }else{
            echo "添加失败";
        }
        return redirect('home/login');
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

    //邮箱激活账号
    public function changestatus(Request $request){
        $id = $request->input('id',0);
        $token = $request->input('token',0);
        $user = Users::find($id);
        if($user->token!=$token){
            return view('errors.404');
        }
        $user->status = 1;
        $user->token = str_random(30);
        if($user->save()){
            return view('home.register.changestatus');
        }else{
            echo '激活失败';
        }
    } 

    //执行手机号注册
    public function  phonestore(Request $request){
        // dump($request->all());
        //验证手机验证码
        $phone = $request->input('phone',0);
        $code = $request->input('code',0);
        //获取发送到手机的验证码
        $k = $phone.'_code';
        $phone_code = session($k);

        // if($code != $phone_code){
        //     echo "<script>alert('验证码错误');location.href='/home/register'</script>";
        //     exit;
        // }

        $users = new users;
        $users->phone = $request->input('phone','');
        $users->uname = $request->input('phone','');
        $users->token = str_random(30);
        $users->upass = Hash::make($request->input('upass',''));
        $users->status = 1;
        if($users->save()){
            // dd('a');
            $uid = $users->id;
            $userinfo = new Usersinfo;
            $userinfo->uid = $uid;
            $userinfo->profile = '20190726/a1wthG6a6oepzqa3SWp5FqTSXXz5pvCLNR6ILP4T.jpeg';
            $userinfo->save();
            echo '添加成功';
        }else{
            echo "添加失败";
        }


    }


    //验证手机号
    public function sendPhone(Request $request){
        //接收手机号
        $phone = $request->input('phone');
        echo $phone;
        $code = rand(1234,4321);
        $k = $phone.'_code';
        session([$k=>$code]);

        $url = "http://v.juhe.cn/sms/send";
        $params = array(
            'key'   => 'd4da990b04257184cd278ea71323bc62', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '176357', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$code, //您设置的模板变量，根据实际情况修改
            'dtype'=>'json'
        );

        $paramstring = http_build_query($params);
        $content = self::juheCurl($url, $paramstring);
        echo $content;
        // $result = json_decode($content, true);
        //返回的结果
        // if ($result) {
        //     var_dump($result);
        // } else {
        //     //请求异常
        // }


    } 

        /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public static function juheCurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    } 
}
