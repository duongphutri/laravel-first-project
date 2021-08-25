@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action=" {{ route('chucnang.update', ['chucnang_User' => $chucnang_User]) }} " method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">nameemail:</label>
                    <input type="text" class="form-control" name="name" value="{{ $chucnang_User->nameemail }}"
                        placeholder="Enter name">
                    <label for="exampleInputEmail1">emailroute:</label>
                    <input type="email" class="form-control" name="email" value="{{ $chucnang_User->emailroute }}"
                        placeholder="Enter email">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>

@endsection
