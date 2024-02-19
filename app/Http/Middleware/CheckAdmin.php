<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure  $next)
    {
        // Lấy thông tin người dùng đang đăng nhập
        $user = auth('cus')->user();

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (auth('cus')->check()) {
            // Kiểm tra xem vai trò của người dùng có phải là admin không
            if ($user->role == 0) {
                // Nếu là admin, cho phép tiếp tục vào trang được bảo vệ
                return $next($request);
            }
        }

        // Nếu không phải là admin, chuyển hướng về trang đăng nhập và cung cấp thông báo
        return redirect()->route('home.index')->with('no','Bạn không có quyền truy cập trang quản trị!');
    }
}