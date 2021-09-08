@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.chitietdonhang.edit', ['chitietdonhang' => $chitietdonhang]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Người Mua</label>
                    <input type="text" class="form-control" value="{{ $chitietdonhang->donhang->nguoimua }}"
                        name="id_donhang" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter nguoimua">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mặt Hàng</label>
                    <input type="text" class="form-control" value="{{ $chitietdonhang->mathang->name }}" name="id_mathang"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter sodienthoai">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">SĐT</label>
                    <input type="text" class="form-control" value="{{ $chitietdonhang->donhang->sodienthoai }}"
                        name="diachi" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter diachi">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa CHỉ</label>
                    <input type="text" class="form-control" value="{{ $chitietdonhang->donhang->diachi }}" name="ngaymua"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ngaymua">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">tongtien</label>
                    <input type="text" class="form-control" value="{{ $chitietdonhang->thanhtien }}" name="tongtien"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter tongtien">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
