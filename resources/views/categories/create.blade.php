@extends ('layouts.app') @section('content')
<table>
    <div class="container">
        <form action="/categories/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</table>
@endsection
