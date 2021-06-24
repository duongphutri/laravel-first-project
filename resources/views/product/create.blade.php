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
            <div class="form-group">
                <label for="exampleInputEmail1">create</label>
                <input type="text" class="form-control" name="created_by" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter create">
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" value="0" class="form-check-input" name="is_show">hide
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" value="1" class="form-check-input" name="is_show" checked>show
                </label>
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</table>
@endsection
