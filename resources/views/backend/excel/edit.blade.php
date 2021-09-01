@extends ('admin_layout')
@section('content')

    <table>
        <div class="container">
            <form action=" {{ route('admin.baogia.update', ['baogia' => $baogia]) }} " method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">ten:</label>
                    <input type="text" class="form-control" name="ten" value="{{ $baogia->ten }}" placeholder="Enter ten">
                    <label for="exampleInputEmail1">chungloai:</label>
                    <input type="text" class="form-control" name="chungloai" value="{{ $baogia->chungloai }}"
                        placeholder="Enter chungloai">
                    <label for="exampleInputEmail1">hang:</label>
                    <input type="text" class="form-control" name="name" value="{{ $baogia->hang }}"
                        placeholder="Enter hang">
                    <label for="exampleInputEmail1">soluong:</label>
                    <input type="text" class="form-control" name="soluong" value="{{ $baogia->soluong }}"
                        placeholder="Enter soluong">
                    <label for="exampleInputEmail1">thongtin:</label>
                    <input type="text" class="form-control" name="thongtin" value="{{ $baogia->thongtin }}"
                        placeholder="Enter thongtin">
                    <div class="form-group">
                        <label for="exampleInputEmail1">dongia:</label>
                        <input type="text" class="form-control" name="dongia" value="{{ $baogia->dongia }}"
                            placeholder="Enter dongia">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ghichu:</label>
                            <textarea class="form-control rounded-0" name="ghichu" id="ghichu" cols=" 100"
                                rows="13"></textarea>
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
