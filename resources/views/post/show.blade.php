 @extends ('layouts.app') @section('content')
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Id:{{$post->id}}</li>
        <li class="list-group-item">Tile:{{$post->title}}</li>
        <li class="list-group-item">Name:{{$post->name}}</li>
    </ul>
</div>
@endsection