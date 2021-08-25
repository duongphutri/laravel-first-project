@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action=" {{ route('admin.users.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">name:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                        placeholder="Enter name">
                    <label for="exampleInputEmail1">email:</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="Enter email">
                    <label for="exampleInputEmail1">password:</label>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                        placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
