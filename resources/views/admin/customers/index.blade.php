@extends('master.dashboard')
@section('title', 'Create Category')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">customers</h3>

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
            <i class="fas fa-folder"></i> Create
        </a>

        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Email</th>
                    <th style="width: 10%">phone</th>
                    <th style="width: 15%">address</th>
                    <th style="width: 10%">gender</th>
                    <th style="width: 10%">role</th>
                    <th style="width: 20%">Actions</th>
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
                        <a class="btn btn-info btn-sm" href="{{ route('customers.edit', $customer->id) }}">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <form id="deleteForm_{{ $customer->id }}"
                            action="{{ route('customers.destroy', $customer->id) }}" method="post"
                            style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="button" class="btn btn-danger"
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
    <!-- /.card-body -->
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