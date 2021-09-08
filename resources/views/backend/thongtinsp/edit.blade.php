@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.thongtin.update', ['thongtin' => $thongtin]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">size</label>
                    <input type="text" class="form-control" value="{{ $thongtin->size }}" name="size"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter size">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">dungluong</label>
                    <input type="text" class="form-control" value="{{ $thongtin->dungluong }}" name="dungluong"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter dungluong">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">mau</label>
                    <input type="text" class="form-control" value="{{ $thongtin->mau }}" name="mau"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter mau">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">chitiet</label>
                    <textarea type="text" class="form-control" value="{{ $thongtin->chitiet }}" name="chitiet"
                        id="thongtin" aria-describedby="emailHelp" placeholder="Enter chitiet">
                </textarea>

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
