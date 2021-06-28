@extends ('layouts.app') @section('content')
    <table>
        <div class="container">
            <form action="{{ route('product.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" name="name"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">image </label>
                    <input type="file" accept="image/*" class="form-control" name="image" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter image" value="">
                        <img style="width: 30%" src="/{{ $product->image }} " alt="">
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">create</label>
                    <input type="text" class="form-control" value="{{ $product->created_by }}" name="created_by"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter created_by">
                </div> --}}

                <div class="form-group">
                    <label class="control-label" for="Company">category</label>
                    <select class="form-control" name="category_id">
                        @if (count($categories))
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif

                    </select>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" value="0" class="form-check-input" name="is_show" {{ !$product->is_show ? "checked" : ""}}>hide
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" value="1" class="form-check-input" name="is_show" {{ $product->is_show ? "checked" : "" }}>show
                    </label>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
