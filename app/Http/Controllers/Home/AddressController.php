<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Address;
use App\Http\Requests\AddressStore;

class AddressController extends Controller
{
    // 收货地址
    public function index()
    {
        // 获取id
        $id = $_SESSION['user']->uid;

        // 获取数据
        $address = DB::table('address')->where('uid',$id)->get();
        
        // 跳转
        return view('home.address.index',['address'=>$address]);
    }

    // 添加地址
    public function add(AddressStore $request)
    {
        // 开启事务
        DB::beginTransaction();
        
        // 获取uid
        $uid = $_SESSION['user']->uid;
        
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
        // dd($data['uname']);
        
        if(empty($data['uname'])){
            echo "<script>alert('用户名不能为空');location.href='/home/address'</script>";
            exit;
        }

        if(empty($data['phone'])){
            echo "<script>alert('手机号不能为空');location.href='/home/address'</script>";
            exit;
        }

        if(empty($data['addr'])){
            echo "<script>alert('地址不能为空');location.href='/home/address'</script>";
            exit;
        }

        // 将数据压入表中
        $res = DB::table('address')->insert($data);

        // 判断
        if($res){
            // 提交事务
            DB::commit();
            return redirect('home/address')->with('success','添加成功');
        }else{
            // 回滚事务
            DB::rollback();
            return back()->with('error','添加失败');
        }
        
    }

    // 修改收货地址
    public function edit($id)
    {
        // 获取用户信息
        $data = Address::find($id);

        // 跳转
        return view('home.address.edit',['data'=>$data]);
    }

    // 执行修改操作
    public function update(AddressStore $request,$id)
    {
        $address = Address::find($id);
        $address->uname = $request->input('uname');
        $address->phone = $request->input('phone');
        $address->province = $request->input('province');
        $address->country = $request->input('country');
        $address->town = $request->input('town');
        $address->addr = $request->input('addr');
        // dd($address->town);

        $data['addr'] = $address->province.$address->country.$address->town.$address->addr;
        $data['uname'] = $address->uname;
        $data['phone'] = $address->phone;

        $res = DB::table('address')->where('id',$id)->update($data);

        // 判断
        if($res){
            // 提交事务
            DB::commit();
            return redirect('home/address')->with('success','修改成功');
        }else{
            // 事务回滚
            DB::rollback();
            return back()->with('error','修改失败');
        }
    }

    // 删除收货地址
    public function destroy($id)
    {
        // dump($id);
        // 开启事务
        DB::beginTransaction();

        // 删除信息
        $res = Address::destroy($id);

        // 判断
        if($res){
            // 提交事务
            DB::commit();
            return redirect('home/address')->with('success','删除成功');
        }else{
            // 事务回滚
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }
    
}
