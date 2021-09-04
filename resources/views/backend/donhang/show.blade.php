@extends ('admin_layout')
@section('content')
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id:{{ $donhang->id }}</li>
            <li class="list-group-item">name:{{ $donhang->nguoimua }}</li>
            <li class="list-group-item">SDT:{{ $donhang->sodienthoai }}</li>
            <li class="list-group-item">FAX:{{ $donhang->diachi }}</li>
            <li class="list-group-item">ngaymua:{{ $donhang->ngaymua }}</li>
            <li class="list-group-item">tongtien:{{ $donhang->tongtien }}</li>
            <li class="list-group-item">created:{{ $donhang->trangthai }}</li>
        </ul>
    </div>
@endsection
