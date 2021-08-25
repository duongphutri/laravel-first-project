@extends ('admin_layout')
@section('content')
<table>
    <div class="container">
        <form action="{{ route('post.update', ['post' => $post]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="text" class="form-control" value="{{ $post->name }}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">create</label>
                <input type="text" class="form-control" value="{{ $post->created_by }}" name="created_by" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter created_by">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</table>
@endsection
