@extends ('admin_layout')
@section('content')
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id:{{ $mathang->id }}</li>
            <li class="list-group-item">name:{{ $mathang->name }}</li>
            <li class="list-group-item">mathang:{{ $mathang->products ? $mathang->products->name : 'NULL' }}</li>
            <td>
                <img style="width: 20%" src="\{{ $mathang->image }}" alt="">
            </td>
            <li class="list-group-item">created:{{ $mathang->gia }}</li>
            <li class="list-group-item">created:{{ $mathang->is_sale }}</li>
            <li class="list-group-item">created:{{ $mathang->is_hot }}</li>
            <li class="list-group-item">created:{{ $mathang->is_new }}</li>
            <li class="list-group-item">created:{{ $mathang->is_show }}</li>
        </ul>
    </div>
@endsection
