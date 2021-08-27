@extends ('admin_layout')
@section('content')

<table>
    <div class="container">

        <form action=" {{ route('admin.user.update', $data->id) }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">name:</label>
                <input type="text" class="form-control" name="name" value="{{ $data->name }}"
                    placeholder="Enter name">
                <label for="exampleInputEmail1">email:</label>
                <input type="email" class="form-control" name="email" value="{{ $data->email }}"
                    placeholder="Enter email">
                <label for="exampleInputEmail1">password:</label>
                <input type="password" class="form-control" name="password" value="{{ $data->password }}"
                    placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</table>

@endsection
