@extends ('admin_layout')
@section('content')
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id:{{ $product->id }}</li>
            <li class="list-group-item">name:{{ $product->name }}</li>
            <li class="list-group-item">category:{{ $product->category ? $product->category->name : 'NULL' }}</li>
            <td>
                <img style="width: 20%"
                    src="/storage/images/{{ isset($product->image_product) ? $product->image_product->file_nm : null }}"
                    alt="">
            </td>
            <li class="list-group-item">created:{{ $product->created_by }}</li>
        </ul>
    </div>
@endsection
