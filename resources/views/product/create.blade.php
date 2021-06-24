@extends ('layouts.app') @section('content')
    <table>
        <div class="container">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" value="{{ old('name') }}" class="form-control" name="name" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label class="control-label" for="Company">category</label>
                    <select class="form-control" name="category_id">
                        @if (count($categories))
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">image</label>
                    <input type="file" accept="image/*" class="form-control" name="image" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter image" value="{{ old('image') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">create</label>
                    <input type="text" value="{{ old('created_by') }}" class="form-control" name="created_by"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter create">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" value="{{ old('is_show') ?? '0' }}" class="form-check-input"
                            name="is_show">hide
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" value="{{ old('is_show') ?? '1' }}" class="form-check-input" name="is_show"
                            checked>show
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
