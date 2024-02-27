@extends('master.dashboard')
@section('title', 'Người dùng')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Người dùng</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <a class="btn btn-primary btn-sm" href="{{ route('customers.create') }}">
            <i class="fas fa-folder"></i> Tạo tài khoảng
        </a>

        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 15%">Tên người dùng</th>
                    <th style="width: 15%">Email</th>
                    <th style="width: 10%">Số điện thoại</th>
                    <th style="width: 15%">Địa chỉ</th>
                    <th style="width: 10%">Giới tính</th>
                    <th style="width: 10%">role</th>
                    <th style="width: 20%">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>@if($customer->gender == 1)
                        Nam
                        @elseif($customer->gender == 0)
                        Nữ
                        @endif</td>
                    <td>@if($customer->role == 1)
                        User
                        @elseif($customer->role == 0)
                        Admin
                        @endif
                    </td>
                    <td class="project-actions">
                        <a class="btn btn-info btn-sm" href="{{ route('customers.edit', $customer->id) }}"
                            style="padding: 0.25rem 0.5rem;">
                            <i class="fas fa-pencil-alt"></i> Sửa
                        </a>
                        <form id="deleteForm_{{ $customer->id }}"
                            action="{{ route('customers.destroy', $customer->id) }}" method="post"
                            style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $customer->id }}, '{{ $customer->name }}')">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
    .pagination {
        display: flex;
        justify-content: center;
    }

    .pagination li {
        margin: 0 5px;
        list-style: none;
        display: inline-block;
    }

    .pagination li a {
        padding: 5px 10px;
        border: 1px solid #ddd;
        color: #333;
        text-decoration: none;
        border-radius: 3px;
    }

    .pagination li.active a {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination li a:hover {
        background-color: #f5f5f5;
    }
    </style>

    @if ($customers->lastPage() > 1)
    <nav>
        <ul class="pagination justify-content-center">
            @php
            $currentPage = $customers->currentPage();
            $lastPage = $customers->lastPage();
            $start = max($currentPage - 3, 1);
            $end = min($currentPage + 3, $lastPage);
            @endphp

            @for ($i = $start; $i <= $end; $i++) <li class="{{ $i == $currentPage ? 'active' : '' }}">
                <a href="{{ $customers->url($i) }}">{{ $i }}</a>
                </li>
                @endfor
        </ul>
    </nav>
    @endif
    <p class="desc-content text-center text-sm-right" style="margin-right:30px">
        Hiển thị {{ $customers->firstItem() }} -
        {{ $customers->lastItem() }} trên tổng số {{ $customers->total() }} kết quả</p>

</div>
<script>
function confirmDelete(customersId, customersName) {
    if (confirm('Bạn có chắc muốn xóa người dùng "' + customersName + '" không?')) {
        // Giả sử bạn có một hàm để gửi biểu mẫu
        document.getElementById('deleteForm_' + customersId).submit();
    }
}
</script>


@stop