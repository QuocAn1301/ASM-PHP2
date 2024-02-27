@extends('master.dashboard')
@section('title', 'Danh sách đơn hàng')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách đơn hàng</h3>
    </div>
    <div class="card-body">
        <h5>Đã thanh toán</h5>
    </div>



    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 5%">STT</th>
                <th style="width: 15%">Tên khách hàng</th>
                <th style="width: 15%">Ngày đặt</th>
                <th style="width: 15%">Trạng thái</th>
                <th style="width: 15%">Thanh toán</th>

                <th style="width: 10%">Tổng tiền</th>
                <th style="width: 10%"></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
            <tr>
                <td class="pro-thumbnail">{{ $loop->iteration }}</td>
                <td class="pro-title">{{$item->name}} </td>
                <td class="pro-title">{{$item->created_at->format('d/m/Y')}} </td>
                <td class="pro-price">
                    @if ($item->status == 0)
                    <span>Đang duyệt </span>
                    @elseif ($item->status == 1)
                    <span>Đang giao hàng </span>
                    @elseif ($item->status == 2)
                    <span>Đã giao hàng </span>
                    @elseif ($item->status == 3)
                    <span>Đã hủy </span>
                    @endif
                </td>
                <td class="pro-price">
                    @if ($item->pay == 0)
                    <span>Chưa thanh toán</span>
                    @elseif ($item->pay == 1)
                    <span>Đã thanh toán </span>
                    @endif
                </td>
                <td class="pro-thumbnail">{{number_format($item->totalPrice) }}
                    VND</td>
                @if ($item->status == 2)
                <td>

                </td>
                @else
                <td>
                    <a href="{{ route('order.admin.show', ['order' => $item->id]) }}"
                        class="btn obrien-button primary-btn">Xem chi tiết</a>
                </td>
                @endif
                @endforeach
            </tr>
        </tbody>

    </table>
</div>
<!-- /.card-body -->
</div>



@stop