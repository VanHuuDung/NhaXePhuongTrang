@extends('main')

@section('content')
<style>
    #clockdiv{
	font-family: sans-serif;
	color: #fff;
	display: inline-block;
	font-weight: 100;
	text-align: center;
	font-size: 30px;
}

#clockdiv > div{
	padding: 10px;
	border-radius: 3px;
	background: #00BF96;
	display: inline-block;
}

#clockdiv div > span{
	padding: 15px;
	border-radius: 3px;
	background: #00816A;
	display: inline-block;
}

.smalltext{
	padding-top: 5px;
	font-size: 16px;
}
</style>
    <form class="bg0 p-t-130 p-b-85" action="/payment" method="post">
        @include('admin.alert')
        @if (count($chuyenxes) != 0)
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                @php $total = 0;$total_ve = 0; @endphp
                                <table class="table-shopping-cart">
                                    <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">TênTuyến</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Xuất Phát</th>
                                        <th class="column-4">Thời Gian</th>
                                        <th class="column-5">Biển Số</th>
                                        <th class="column-6">Danh Sách</th>
                                        <th class="column-5">Giá</th>
                                        <th class="column-7">&nbsp;</th>
                                    </tr>
                                    @foreach($chuyenxes as $key => $chuyenxe)
                                        
                                        <tr class="table_row">
                                            <td class="column-1">{{  $carts[$chuyenxe->MaChuyenXe]['tuyenxe'] }} </td>
                                            <td class="column-2"></td>
                                            <td class="column-3">{{  $carts[$chuyenxe->MaChuyenXe]["ngayxuatphat"] }}</td>
                                            <td class="column-4">{{  $carts[$chuyenxe->MaChuyenXe]["tongthoigian"] }} Giờ</td>
                                            <td class="column-5">
                                                {{  $carts[$chuyenxe->MaChuyenXe]["biensoxe"] }}
                                            </td>
                                            <td class="column-6">
                                                @foreach( $carts[$chuyenxe->MaChuyenXe]['dsghe'] as $dsghe)
                                                    {{$dsghe}}
                                                @endforeach
                                            </td>
                                         
                                            <td class="column-5">{{ number_format($carts[$chuyenxe->MaChuyenXe]["gia"], 0, '', '.') }}vnđ</td>
                                            <td class="p-r-15">
                                                <a href="/carts/delete/{{ $chuyenxe->MaChuyenXe }}">Xóa</a>
                                            </td>
                                        </tr>
                                        @php $total_ve+=count($carts[$chuyenxe->MaChuyenXe]['dsghe']);
                                             $total += count($carts[$chuyenxe->MaChuyenXe]['dsghe']) * $carts[$chuyenxe->MaChuyenXe]["gia"];
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                           name="coupon" placeholder="Coupon Code">

                                    <div
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Apply coupon
                                    </div>
                                </div>

                                <input type="submit" value="Update Cart" formaction="/update-cart"
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Tổng số lượng vé:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{$total_ve }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Tổng số tiền:
                                    </span>
                                </div>
                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{ number_format($total, 0, '', '.') }} vnđ
                                        <input type="hidden" name="tongtien" value="{{ $total }}">
                                    </span>
                                </div>
                            </div>
                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">

                                    <div class="p-t-15">
                                        <span class="stext-112 cl8">
                                            Thông Tin Khách Hàng
                                        </span>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Tên khách Hàng" required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Số Điện Thoại" required>
                                        </div>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="Email Liên Hệ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                               Đặt Hàng
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
    </form>
    @else
        <div style="margin-bottom: 50px; margin-top: 50px;" class="text-center"><h2>Giỏ hàng trống</h2></div>
    @endif
@endsection
