@extends ('admin_layout')
@section('content')
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id:{{ $donhang->id }}</li>
            <li class="list-group-item">name:{{ $donhang->nguoimua }}</li>
            <li class="list-group-item">created:{{ $donhang->gia }}</li>
            <li class="list-group-item">created:{{ $donhang->ngaymua }}</li>
            <li class="list-group-item">created:{{ $donhang->tongtien }}</li>
            <li class="list-group-item">created:{{ $donhang->trangthai }}</li>
        </ul>
    </div>
@endsection
