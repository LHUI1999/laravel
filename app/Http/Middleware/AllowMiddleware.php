<?php

namespace App\Http\Middleware;

use Closure;

class AllowMiddleware
{

    public function list(){
        $action = \Route::current()->getActionName();
        list($class,$method) = explode('@',$action);
        $class = substr(strrchr($class,'\\'),1);
        return ['controller' =>$class,'method'=>$method];
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin_nodes = session('admin_nodes');
        dump($admin_nodes);

        $data = $this->list();
        //获取正在访问的控制器名称和方法名称
        $cname = strtolower($data['controller']);
        $aname = strtolower($data['method']);
        //获取可以控制的控制器
        $controllers = array_keys($admin_nodes);

        if(!in_array($cname,$controllers)){
            return redirect('admin/allow');
        }
        //获取可以操作的方法
        $methods = $admin_nodes[$cname];
        if(!in_array($aname,$methods)){
            return redirect('admin/allow');
        }
        
        return $next($request);
    }
}
