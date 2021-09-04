@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.donhang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">nguoimua</label>
                    <input type="text" value="{{ old('nguoimua') }}" class="form-control" name="nguoimua"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter nguoimua">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">sodienthoai</label>
                    <input type="text" value="{{ old('sodienthoai') }}" class="form-control" name="sodienthoai"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter sodienthoai">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">diachi</label>
                    <input type="text" value="{{ old('diachi') }}" class="form-control" name="diachi"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter diachi">
                </div>
                <div class="form-group">
                    <label class="control-label" for="Company">mathang</label>
                    <select class="form-control" name="id_product">
                        @if (count($mathangs))
                            @foreach ($mathangs as $mathang)
                                <option value="{{ $mathang->id }}"
                                    {{ old('id_mathang') == $mathang->id ? 'selected' : '' }}>
                                    {{ $mathang->name }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ngaymua</label>
                    <input type="date" value="{{ old('ngaymua') }}" class="form-control" name="ngaymua"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ngaymua">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">tongtien</label>
                    <input type="text" value="{{ old('tongtien') }}" class="form-control" name="tongtien"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter tongtien">
                </div>
                <div>

                    <label for="exampleInputEmail1">trangthai</label>
                    <input type="text" value="{{ old('trangthai') }}" class="form-control" name="trangthai"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter trangthai">
                </div>
                </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </table>
@endsection
