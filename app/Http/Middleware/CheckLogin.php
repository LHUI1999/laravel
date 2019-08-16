<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(!isset($_SESSION['user'])){
            echo "<script>alert('请先登录/注册再访问');location.href='/home/login'</script>";
            // return redirect('/home/login');
        }else{
            return $next($request);
        }
        
    }
}
