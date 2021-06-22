@extends ('layouts.app') @section('content')
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Id:{{$category->id}}</li>
        <li class="list-group-item">Name:{{$category->name}}</li>
    </ul>
</div>
@endsection