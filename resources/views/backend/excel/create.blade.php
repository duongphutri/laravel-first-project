@extends ('admin_layout')
@section('content')


    <table>
        <div class="container">
            @if (session()->has('thongbao'))
                <div class="alert alert-success">{{ session('thongbao') }}</div>
            @endif
            <form action="{{ route('admin.baogia.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">ten:</label>
                    <input type="text" class="form-control" name="ten" value="{{ old('ten') }}"
                        placeholder="Enter ten">
                    <label for="exampleInputEmail1">chungloai:</label>
                    <input type="text" class="form-control" name="chungloai" value="{{ old('chungloai') }}"
                        placeholder="Enter chungloai">
                    <label for="exampleInputEmail1">hang:</label>
                    <input type="text" class="form-control" name="hang" value="{{ old('hang') }}"
                        placeholder="Enter hang">
                    <label for="exampleInputEmail1">soluong:</label>
                    <input type="text" class="form-control" name="soluong" value="{{ old('soluong') }}"
                        placeholder="Enter soluong">
                    <label for="exampleInputEmail1">thongtin:</label>
                    <input type="text" class="form-control" name="thongtin" value="{{ old('thongtin') }}"
                        placeholder="Enter thongtin">
                    <div class="form-group">
                        <label for="exampleInputEmail1">dongia:</label>
                    <input type="text" class="form-control" name="dongia" value="{{ old('dongia') }}"
                        placeholder="Enter dongia">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ghichu:</label>
                        <textarea class="form-control rounded-0" name="ghichu" id="ghichu" cols=" 100" rows="13"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>

@endsection
@section('javascript')
    <script>
        tinymce.init({
            selector: '#ghichu'
        });

    </script>

@endsection
