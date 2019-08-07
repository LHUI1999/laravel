<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userspay;
use App\Models\Users;
use Hash;

class SafeController extends Controller
{
    //是否设置支付密码
	public static function ispay()
	{
		$pay = Userspay::where('uid',$_SESSION['user']->id)->first();
    	return $pay;
	}
    //安全设置首恶
    public function index()
    {

    	return view('home.safe.index',['pay'=>self::ispay()]);
    }

    //修改密码
    public function password(){
    	return view('home.safe.password');
    }
    //执行修改密码
    public function passedit(Request $request,$id)
    {	
    	//用户信息
    	$userpass = Users::where('id',$id)->first();

    	//判断原密码是否正确
    	if(!Hash::check($request->input('oldpass'),$userpass->upass) ){
    		echo "<script>alert('原密码错误');location.href='/home/password'</script>";
    		exit;
    	}else{
    		//判断两次密码是否一致
    		if($request->input('newpass')!==$request->input('repass')){
    			echo "<script>alert('两次密码不一致');location.href='/home/password'</script>";
    			exit;
    		}
    		if(strlen($request->input('newpass')) < 6){
				echo "<script>alert('密码长度最少为6位');location.href='/home/password'</script>";
    			exit;
    		}
    		$user = Users::where('id',$id)->first();
    		$user->upass = Hash::make($request->input('newpass'));
    		if($user->save()){
    			echo "<script>alert('修改成功');location.href='/home/safe'</script>";
    		}
    	}

    }

    //修改支付密码
    public function paypass()
    {
    	return view('home.safe.paypass');
    }


    //执行手机号注册
    public function  paystore(Request $request){
    	//判断密码是否为六位
    	if(strlen($request->input('num'))!=6){
    		echo "<script>alert('密码长度为六位');location.href='/home/safe/paypass'</script>";
    		exit;
    	}
    	//判断两次密码是否一致
    	if($request->input('num')!==$request->input('renum')){
    		echo "<script>alert('两次密码不一致');location.href='/home/safe/paypass'</script>";
    		exit;
    	}
        // dump($request->all());
        //验证手机验证码
        $phone = $_SESSION['user']->phone;
        $code = $request->input('code',0);
        //获取发送到手机的验证码
        $k = $phone.'_code';
        $phone_code = session($k);

        if($code != $phone_code){
            echo "<script>alert('验证码错误');location.href='/home/register'</script>";
            exit;
        }


        //将密码写入数据库
        if(self::ispay()==null){
	    	$pay = new Userspay;
	    	$pay->uid = $_SESSION['user']->id;
    		$pay->pay = Hash::make($request->input('num'));
    		if($pay->save()){
	    		echo "<script>alert('密码设置成功');location.href='/home/safe'</script>";
	    	}

	    }else{
	    	// dd(self::ispay());
	    	$payid = self::ispay()->id;
	    	// dd($payid);
	    	$pay = Userspay::where('id',$payid)->first();
	    	

	    	$pay->pay = Hash::make($request->input('num'));
    		if($pay->save()){
	    		echo "<script>alert('密码设置成功');location.href='/home/safe'</script>";
	    	}
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

    //手机验证
    public function bindphone()
    {
    	return view('home.safe.bindphone');
    }
    //更换手机
    public function changephone(Request $request)
    {
         dump($request->all());
        //验证手机验证码
        $phone1 = $request->input('phone1',0);
        $code1 = $request->input('code1',0);
        //获取发送到手机的验证码
        $k = $phone1.'_code';
        $phone_code = session($k);
        //验证原手机验证码
        // if($code1 != $phone_code){
        //     echo "<script>alert('原手机验证码错误');location.href='/home/safe/bindphone'</script>";
        //     exit;
        // }

        //验证手机验证码
        $phone2 = $request->input('phone2',0);
        $code2 = $request->input('code2',0);
        //获取发送到手机的验证码
        $k = $phone2.'_code';
        $phone_code2 = session($k);
        //验证新手机验证码
        // if($code2 != $phone_code2){
        //     echo "<script>alert('新手机验证码错误');location.href='/home/safe/bindphone'</script>";
        //     exit;
        // }
        //写入数据库
        $users = Users::find($_SESSION['user']->id);
        $users->phone = $request->input('phone2','');
       
        if($users->save()){
            $_SESSION['user']->phone = $request->input('phone2','');
           echo "<script>alert('更换成功');location.href='/home/safe'</script>";
           
        }else{
            echo "添加失败";
        }
    }

    //邮箱换绑
    public function email()
    {
        // dd($_SESSION['user']->email);
        return view('home.safe.email');
    }

    //发送邮箱验证码
    public function sendemail(Request $request)
    {
        // console.log('aaa');
        //接收手机号
        $email = $request->input('email');
        $code = rand(1234,4321);
        $k = $phone.'_code';
        session([$k=>$code]);
        //发送邮件
        Mail::send('home.email.email',['id'=>$users->id,'token'=>$users->token],function($m) use ($users){
            $m->to($email)->subject($code);
        });

       
    }
    public function changeemail(Request $request)
    {
        dump($request->all());
        //
        //验证手机验证码
        $email = $request->input('email');
        $code = $request->input('code',0);
        //获取发送到手机的验证码
        $k = $email.'_code';
        $email_code = session($k);

        // if($code != $email_code){
        //     echo "<script>alert('验证码错误');location.href='/home/register'</script>";
        //     exit;
        // }
        
        $users = Users::find($_SESSION['user']->id);
        $users->email = $request->input('email','');
       
        
        if($users->save()){
            $_SESSION['user']->email = $email;
             echo "<script>alert('更换成功');location.href='/home/safe'</script>";
        }else{
            echo "添加失败";
        }
       
    }

}
