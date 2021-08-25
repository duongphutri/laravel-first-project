@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.mau.create', ['mau' => $mau]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">mau</label>
                    <input type="text" class="form-control" name="mau" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter mau">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
