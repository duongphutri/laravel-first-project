@extends ('layouts.app') @section('content')
<table>
    <div class="container">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">category</label>
                <input type="text" class="form-control" name="category_id" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">create</label>
                <input type="text" class="form-control" name="created_by" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter create">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</table>
@endsection
