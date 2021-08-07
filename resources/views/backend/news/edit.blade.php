@extends ('layouts.app') @section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.news.update', ['news' => $news]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" class="form-control" value="{{ $news->title }}" name="title"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">description</label>
                    <input type="text" class="form-control" value="{{ $news->description }}" name="description"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">content</label>
                    <input type="text" class="form-control" value="{{ $news->content }}" name="content"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter content">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">image_id</label>
                    <input type="text" class="form-control" value="{{ $news->image_id }}" name="image_id"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image_id">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">created_by</label>
                    <input type="text" class="form-control" value="{{ $news->created_by }}" name="created_by"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter created_by">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
