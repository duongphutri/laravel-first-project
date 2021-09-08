
@extends ('admin_layout')
@section('content')
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id:{{ $chitietdonhang->id }}</li>
            <li class="list-group-item">Người Mua:{{ $chitietdonhang->donhang ? $chitietdonhang->donhang->nguoimua : 'NULL' }}</li>
            <li class="list-group-item">Mặt hàng:{{ $chitietdonhang->mathang ? $chitietdonhang->mathang->name : 'NULL' }}</li>
            <li class="list-group-item">SĐT:{{ $chitietdonhang->donhang->sodienthoai }}</li>
            <li class="list-group-item">Địa Chỉ:{{ $chitietdonhang->donhang->diachi }}</li>
            <li class="list-group-item">Thành Tiền:{{ number_format($chitietdonhang->thanhtien) }}</li>
        </ul>
    </div>
@endsection
