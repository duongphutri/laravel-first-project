@extends ('layouts.app') @section('content')
<table>
    <div class="container">
        <form action="{{ route('product.update', ['product' => $product]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" class="form-control" value="{{ $product->name }}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">category</label>
                <input type="text" class="form-control" value="{{ $product->category_id }}" name="category_id" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category_id">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">create</label>
                <input type="text" class="form-control" value="{{ $product->created_by }}" name="created_by" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter created_by">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</table>
@endsection
