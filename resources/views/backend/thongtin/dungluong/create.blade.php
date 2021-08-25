@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.dungluong.create', ['dungluong' => $dungluong]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">dungluong</label>
                    <input type="text" class="form-control" name="dungluong" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter dungluong">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
