<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * 收货地址
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取id
        $id = $_SESSION['user']->id;
        // 获取数据
        $address = DB::table('address')->where('uid',$id)->get();
        // 跳转
        return view('home.address.index',['address'=>$address]);
    }

    /**
     * 用户删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        // 开启事务
        DB::beginTransaction();
        //判断用户名是否为空
        if(empty($request->input('uname'))){
            echo "<script>alert('用户名不能为空');location.href='/home/address'</script>";
            exit;
        }
        //判断手机号是否为空
        if(empty($request->input('phone'))){
            echo "<script>alert('手机号不能为空');location.href='/home/address'</script>";
            exit;
        }else{
            //正则匹配
            $page = '/^1{1}[3-9]{1}[\d]{9}$/';
            preg_match_all ( $page, $request->input('phone'),$res);
            //判断是否匹配成功
            if(empty($res[0])){
                echo "<script>alert('手机号格式不正确');location.href='/home/address'</script>";
                exit;
            }
        }
        //判断地址是否为空
        if(empty($request->input('addr'))){
            echo "<script>alert('地址不能为空');location.href='/home/address'</script>";
            exit;
        }
        // 获取uid
        $uid = $_SESSION['user']->id;
        // 检查地址
        $province = $request->input('province','');
        $country = $request->input('country','');
        $town = $request->input('town','');
        $addr = $request->input('addr','');
        $uname = $request->input('uname','');
        $phone = $request->input('phone','');
        // 判断
        if(empty($province) || empty($country) || empty($town) || empty($addr)){
            return back();
        }
        // 获取数据
        $data['uid'] = $uid;
        $data['addr'] = $province.$country.$town.$addr;
        $data['uname'] = $uname;
        $data['phone'] = $phone;
        // 将数据压入表中
        $res = DB::table('address')->insert($data);
        // 判断
        if($res){
            // 提交事务
            DB::commit();
            return redirect('home/address');
        }else{
            // 回滚事务
            DB::rollback();
            return back();
        }
    }

    /**
     * 修改收货地址
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取用户信息
        $data = Address::find($id);
        // 跳转
        return view('home.address.edit',['data'=>$data]);
    }

    /**
     * 执行地址修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
        //获取收货地址信息
        $address = Address::find($id);
        //判断用户名是否为空
        if(empty($request->input('uname'))){
            echo "<script>alert('用户名不能为空');location.href='/home/address/".$address->id."/edit'</script>";
            exit;
        }
        //判断手机号是否为空
        if(empty($request->input('phone'))){
            echo "<script>alert('手机号不能为空');location.href='/home/address/".$address->id."/edit'</script>";
            exit;
        }else{
            //正则匹配
            $page = '/^1{1}[3-9]{1}[\d]{9}$/';
            preg_match_all ( $page, $request->input('phone'),$res);
            //判断是否匹配成功
            if(empty($res[0])){
                echo "<script>alert('手机号格式不正确');location.href='/home/address/".$address->id."/edit'</script>";
                exit;
            }
        }
        //判断地址是否为空
        if(empty($request->input('addr'))){
            echo "<script>alert('地址不能为空');location.href='/home/address/".$address->id."/edit'</script>";
            exit;
        }
        //获得提交信息
        $address->uname = $request->input('uname');
        $address->phone = $request->input('phone');
        $address->province = $request->input('province');
        $address->country = $request->input('country');
        $address->town = $request->input('town');
        $address->addr = $request->input('addr');   
        //拼接内容
        $data['addr'] = $address->province.$address->country.$address->town.$address->addr;
        $data['uname'] = $address->uname;
        $data['phone'] = $address->phone;
        //修改地址
        $res = DB::table('address')->where('id',$id)->update($data);

        // 判断是否修改成功
        if($res){
            // 提交事务
            DB::commit();
            return redirect('home/address');
        }else{
            // 事务回滚
            DB::rollback();
            return back();
        }
    }

    /**
     * 删除收货地址
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务
        DB::beginTransaction();
        // 删除信息
        $res = Address::destroy($id);
        // 判断地址是否删除成功
        if($res){
            // 提交事务
            DB::commit();
            return back();
        }else{
            // 事务回滚
            DB::rollback();
            return back();
        }
    }
}
