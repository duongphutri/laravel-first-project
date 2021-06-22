@extends ('layouts.app') @section('content')
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Id:{{$product->id}}</li>
        <li class="list-group-item">Tile:{{$product->name}}</li>
        <li class="list-group-item">category:{{$product->category ? $product->category->name : 'NULL'}}</li>
        <li class="list-group-item">created:{{$product->created_by}}</li>
    </ul>
</div>
@endsection
