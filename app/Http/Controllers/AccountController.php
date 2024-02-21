<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyAccount;
use App\Mail\ForgotPassword;
use Hash;

class AccountController extends Controller
{
    public function login()
    {
        return view('account.login');
    }
    // public function check_login(Request $req)
    // {
    //     $req->validate([
    //         'email' => 'required|exists:customers',
    //         'password' => 'required',
    //     ], [
    //         'email.required' => 'Vui lòng nhập địa chỉ Email.',
    //         'email.exists' => 'Email không tồn tại trong hệ thống.',
    //         'password.required' => 'Vui lòng nhập mật khẩu.',
    //     ]);
    //     $data = $req->only('email', 'password');
    //     $check = auth('cus')->attempt($data);

    //     if ($check) {
    //         if (auth('cus')->user()->email_verified_at == '') {
    

   
    public function check_login(Request $req)
{
    $req->validate([
        'email' => 'required|exists:customers',
        'password' => 'required',
    ], [
        'email.required' => 'Vui lòng nhập địa chỉ Email.',
        'email.exists' => 'Email không tồn tại trong hệ thống.',
        'password.required' => 'Vui lòng nhập mật khẩu.',
    ]);

    $data = $req->only('email', 'password');
    $check = auth('cus')->attempt($data);

    if ($check) {
        $user = auth('cus')->user();

        if ($user->email_verified_at == null) {
            auth('cus')->logout();
            return redirect()->back()->with('no', 'Tài khoảng của bạn chưa được xác minh, vui lòng kiểm tra email');
        }
        if ($user->role == 0) {
            // Nếu là admin (vai trò 0), chuyển hướng đến trang dashboard
           return redirect()->route('categories.index')->with('ok', 'Chào mừng trở lại');
        } else {
            //Nếu là user (vai trò 1), chuyển hướng đến trang index
            return redirect()->route('home.index')->with('ok', 'Chào mừng trở lại');
        }
    } else {
        return redirect()->back()->withErrors(['loginError' => 'Tài khoản hoặc mật khẩu không đúng.']);
    }
}


    public function register()
    {
        //dieu huong rounter
        return view('account.register');

    }
    public function check_register(Request $req)
    {
        // Kiểm tra form
        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Họ và tên không được để trống',
            'name.min' => 'Họ và tên không được ít hơn 6 ký tự',
            'name.max' => 'Họ và tên không được nhiều hơn 100 ký tự',

            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.min' => 'Email không được ít hơn 6 ký tự',
            'email.max' => 'Email không được nhiều hơn 100 ký tự',
            'email.unique' => 'Email đã được sử dụng, vui lòng chọn một địa chỉ email khác',

            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu không được ít hơn 4 ký tự',

            'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
            'confirm_password.same' => 'Xác nhận mật khẩu phải giống với mật khẩu',
        ]);

        $data = $req->only('name', 'email', 'password');
        $data['password'] = bcrypt($req->password);

        if ($acc = Customer::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('ok', 'Đăng ký thành công. Vui lòng kiểm tra email để xác minh tài khoản.');
        }

        return redirect()->back()->with('no', 'Đã xảy ra lỗi khi đăng ký.');
    }


    public function veryfy($email)
    {
        Customer::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        Customer::where('email', $email)->update(['email_verified_at' => date('Y-m-d')]);
        return redirect()->route('account.login')->with('ok', 'xác minh tài khoảng thành công');
    }

    public function logout()
    {
        auth('cus')->logout();
        return redirect()->route('account.login')->with('ok', 'Tạm biệt bạn');
    }
    
    public function profile()
    {
        $auth = auth('cus')-> user();
        
        return view('account.profile',compact('auth'));
    }
    
    public function check_profile(Request $req)
    {
        $auth = auth('cus')-> user();
        $req->validate([
    'email' => 'email|unique:customers,email,' . $auth->id,
    
    'name' => 'string|max:255',
    'phone' => 'max:10',
    'address' => 'max:255',
], [
    'email.required' => 'Vui lòng nhập địa chỉ Email.',
    'email.email' => 'Địa chỉ Email không đúng định dạng.',
    'email.unique' => 'Email đã tồn tại trong hệ thống.',
    'password.required' => 'Vui lòng nhập mật khẩu.',
    'name.required' => 'Vui lòng nhập tên.',
    'name.string' => 'Tên phải là chuỗi ký tự.',
    'name.max' => 'Tên không được vượt quá :max ký tự.',
    'phone.required' => 'Vui lòng nhập số điện thoại.',
    'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
    'phone.max' => 'Số điện thoại không được vượt quá :max ký tự.',
    'address.required' => 'Vui lòng nhập địa chỉ.',
    'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
    'address.max' => 'Địa chỉ không được vượt quá :max ký tự.',
]);
        $data = $req->only('name', 'email', 'phone','address','gender');
        $check = $auth->update($data);
        if($check)
        {
            return redirect()->back()->with('ok', 'cập nhập thông tin thành công');
        }
        return redirect()->back()->with('no', 'có lỗi gì đó xảy ra, vui lòng đợi ít phút rồi thử lại');
        
    }

    public function change_password()
    {
        return view('account.change_password');
    }
    public function check_change_password(Request $req)
    {
        $auth = auth('cus')-> user();
        $req->validate([
            'old_password' => ['required', function($attr, $value, $fail) use($auth){
                if(!Hash::check($value, $auth->password)){
                    return $fail('mật khẩu cũ không đúng ');
                }
            }],
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
            
        ],[
            'old_password.required' => 'Vui lòng nhập mật khẩu cũ.',
            'old_password' => 'Mật khẩu cũ không đúng.',
            'password.required' => 'Vui lòng nhập mật khẩu mới.',
            'password.min' => 'Mật khẩu mới phải có ít nhất :min ký tự.',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu mới.',
            'confirm_password.same' => 'Mật khẩu nhập lại không khớp với mật khẩu mới.',
        ]);
        $data['password'] = bcrypt($req->password);
        $check2 = $auth->update($data);
        if($check2)
        {
            auth('cus')->logout();
            return redirect()->route('account.login')->with('ok', 'cập nhập mật khẩu thành công');
        }
        return redirect()->back()->with('no', 'có lỗi gì đó xảy ra, vui lòng đợi ít phút rồi thử lại');
    }
    public function forgot_password()
    {
        return view('account.forgot_password');
    }
    public function check_forgot_password(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:customers'
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ Email.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
        ]);

        $customer = Customer::where('email',$req->email)->first();
        $token = \Str::random(30);
        $tokenData =[
            'email'=> $req->email,
            'token'=> $token
        ];
        if(CustomerResetToken::create($tokenData)){
            Mail::to($req->email)->send(new ForgotPassword($customer,$token));
            return redirect()->route('account.login')->with('ok', 'vui lòng kiểm tra email để đổi mật khẩu');
        }       
    }

    public function reset_password($token)
    {
        $tokenData = CustomerResetToken::checkToken($token);
        return view('account.reset_password');
    }
    public function check_reset_password($token,Request $req)
    {
        $req->validate([
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu.',
            'confirm_password.same' => 'Mật khẩu nhập lại không khớp với mật khẩu mới.',
        ]);
        $tokenData = CustomerResetToken::checkToken($token);
        $customer = $tokenData-> customer;
        $data = [
            'password' => bcrypt(request(('password')))
        ];
        $check= $customer-> update($data);
        if($check)
        {
            return redirect()->route('account.login')->with('ok', 'lấy lại mật khẩu thành công');
        }
        return redirect()->back()->with('no', 'có lỗi gì đó xảy ra, vui lòng đợi ít phút rồi thử lại');
    }
}