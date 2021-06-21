@extends ('layouts.app') @section('content')
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Id:{{$news->id}}</li>
        <li class="list-group-item">Tile:{{$news->title}}</li>
        <li class="list-group-item">description:{{$news->description}}</li>
        <li class="list-group-item">content:{{$news->content}}</li>
        <li class="list-group-item">image_id:{{$news->image_id}}</li>
        <li class="list-group-item">created_by:{{$news->created_by}}</li>
    </ul>
</div>
@endsection