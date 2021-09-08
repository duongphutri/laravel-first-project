@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.thongtin.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">size</label>
                    <input type="text" class="form-control" name="size" value="{{ old('size') }}"  placeholder="Enter size">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">dungluong</label>
                    <input type="text" class="form-control" name="dungluong" value="{{ old('dungluong') }}"
                         placeholder="Enter dungluong">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">mau</label>
                    <input type="text" class="form-control" name="mau" value="{{ old('mau') }}"  placeholder="Enter mau">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">chitiet</label>
                    <textarea class="form-control rounded-0" name="chitiet" id="thongtin" cols=" 100" rows="13"></textarea>

                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
<script>
    tinymce.init({
        selector: '#thongtin'
    });

</script>
