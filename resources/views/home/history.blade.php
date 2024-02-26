@extends('master.main')

@section('main')

<div class="cart-main-wrapper mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">STT</th>
                                <th class="pro-title">Ngày đặt </th>
                                <th class="pro-price">Trạng thái</th>
                                <th class="pro-price">Thanh toán</th>
                                <th class="pro-subtotal">Tổng tiền</th>
                                <th class="pro-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($auth->orders as $item)
                            <tr>
                                <td class="pro-thumbnail">{{ $loop->iteration }}</td>
                                <td class="pro-title">{{$item->created_at->format('d/m/Y')}} </td>
                                <td class="pro-price">
                                    @if ($item->status == 0)
                                    <span>Đang duyệt </span>
                                    @elseif ($item->status == 1)
                                    <span>Đang giao hàng </span>
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
                                <td>
                                    @if($item->status==3)
                                    <div style="display: flex; align-items: center;">
                                        <a href="{{ route('order.detail', ['order' => $item->id]) }}"
                                            class="btn obrien-button primary-btn">Xem chi tiết</a>
                                    </div>
                                    @else
                                    <div style="display: flex; align-items: center;">
                                        <a href="{{ route('order.detail', ['order' => $item->id]) }}"
                                            class="btn obrien-button primary-btn">Xem chi tiết</a>

                                        <form action="{{ route('order.cancel', ['order' => $item->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="btn obrien-button primary-btn"
                                                style="background-color: #fc0339; color:white;">Hủy</button>
                                        </form>
                                    </div>
                                    @endif
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop