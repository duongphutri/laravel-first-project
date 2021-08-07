@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter name">
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">image:</label>
                    <input type="file" accept="image/*" class="form-control" name="image" placeholder="Enter image"
                        value="{{ old('image') }}">
                </div> --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
