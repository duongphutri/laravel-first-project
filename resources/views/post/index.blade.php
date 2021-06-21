@extends ('layouts.app') @section('content')
<a class="btn btn-primary" href="{{route('post.create')}}">create</a>

<table class="table table-light">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">name</th>
            <th scope="col">created</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">
                {{ $loop->iteration }}
            </th>
            <td>{{$post->title}}</td>
            <td>{{$post->name}}</td>
            <td>{{$post->created_by}}</td>
            <td>
                <a href="{{ route('post.show', ['post'=> $post]) }}">view</a>
                <a href="{{ route('post.edit',['post'=>$post])}}">edit</a>
                <a href="{{ route('post.destroy',['post'=>$post])}}">delete</a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection