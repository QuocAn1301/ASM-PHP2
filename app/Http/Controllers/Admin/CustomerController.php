<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(8);
    return view('admin.customers.index', compact('customers'));
    }
    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
{
    $validator = $request->validate([
        'name' => 'required|min:6|max:100',
        'email' => 'required|email|unique:customers,email',
        'password' => 'required|min:4',
        'confirm_password' => 'required|same:password',

    ], [
        'name.required' => 'Vui lòng nhập tên của bạn.',
        'name.min' => 'Tên phải có ít nhất 6 ký tự.',
        'name.max' => 'Tên không được vượt quá 100 ký tự.',
        'email.required' => 'Vui lòng nhập địa chỉ email.',
        'email.email' => 'Địa chỉ email không hợp lệ.',
        'email.unique' => 'Địa chỉ email đã tồn tại.',
        'password.required' => 'Vui lòng nhập mật khẩu.',
        'password.min' => 'Mật khẩu phải có ít nhất 4 ký tự.',
        'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
        'confirm_password.same' => 'Xác nhận mật khẩu phải giống với mật khẩu',
    ]);

    // Tạo một bản ghi mới cho khách hàng
   // Tạo một bản ghi mới cho khách hàng
$customer = Customer::create([
    'name' => $request->input('name'),
    'email' => $request->input('email'),
    'password' => bcrypt($request->input('password')),
    'email_verified_at' => now(), // Cập nhật ngày giờ hiện tại
]);

    

    // Chuyển hướng về trang danh sách khách hàng hoặc hiển thị thông báo thành công
    return redirect()->route('customers.index')->with('ok', 'Tài khoản đã được tạo thành công!');
}


    public function edit($id)
{
    $customers = Customer::findOrFail($id);

    return view('admin.customers.edit', compact('customers'));
}

    
    public function update(Request $request, $id)
    {
    $validator = $request->validate([
        'name' => 'required|min:6|max:100',
        'email' => 'required|email|min:6|max:100|unique:customers,email,' . $id,
        'phone' => 'required|min:10|max:15',
        'address' => 'required',
        'gender' => 'required',
        'role' => 'required',
        'email_verified_at' => 'nullable|date',
    ], [
        'name.required' => 'Họ và tên không được để trống',
        'name.min' => 'Họ và tên không được ít hơn 6 ký tự',
        'name.max' => 'Họ và tên không được nhiều hơn 100 ký tự',
        'email.required' => 'Email không được để trống',
        'email.email' => 'Email không hợp lệ',
        'email.min' => 'Email không được ít hơn 6 ký tự',
        'email.max' => 'Email không được nhiều hơn 100 ký tự',
        'email.unique' => 'Email đã được sử dụng, vui lòng chọn một địa chỉ email khác',
        'phone.required' => 'Số điện thoại không được để trống',
        'phone.min' => 'Số điện thoại không hợp lệ',
        'phone.max' => 'Số điện thoại không hợp lệ',
        'address.required' => 'Địa chỉ không được để trống',
        'address.min' => 'Địa chỉ không hợp lệ',
        'address.max' => 'Địa chỉ không hợp lệ',
        'gender.required' => 'Giới tính không được để trống',
        'gender.in' => 'Giới tính không hợp lệ',
        'role.required' => 'Vai trò không được để trống',
        'role.in' => 'Vai trò không hợp lệ',
        'email_verified_at.date' => 'Ngày xác minh email không hợp lệ',
    ]);

    $customer = Customer::findOrFail($id);

    // Cập nhật dữ liệu mới
    $customer->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'gender' => $request->input('gender'),
        'role' => $request->input('role'),
        'email_verified_at' => $request->input('email_verified_at'),
    ]);

    return redirect()->route('customers.index')
        ->with('success', 'Customer updated successfully');
    }


    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        // Tiếp theo, xóa sản phẩm
        $customers->delete();
    
        return redirect()->route('customers.index')->with('ok', 'customers deleted successfully');
    }
}