@extends ('admin_layout')
@section('content')
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id:{{ $mathang->id }}</li>
            <li class="list-group-item">name:{{ $mathang->name }}</li>
            <li class="list-group-item">soluong:{{ $mathang->soluong }}</li>
            <li class="list-group-item">chung loai:{{ $mathang->products ? $mathang->products->category->name : 'NULL' }}</li>
            <li class="list-group-item">san pham:{{ $mathang->products ? $mathang->products->name : 'NULL' }}</li>
            <li>image:
                <img style="width: 20%"
                    src="/storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}  "
                    alt="">
            </li>
            <li class="list-group-item">created:{{ number_format($mathang->gia)  }}</li>
        </ul>
    </div>
@endsection
