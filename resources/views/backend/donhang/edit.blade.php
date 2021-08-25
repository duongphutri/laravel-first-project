@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.donhang.update', ['donhang' => $donhang]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">nguoimua</label>
                    <input type="text" class="form-control" value="{{ $donhang->nguoimua }}" name="nguoimua"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter nguoimua">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ngaymua</label>
                    <input type="date" class="form-control" value="{{ $donhang->ngaymua }}" name="ngaymua"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ngaymua">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">tongtien</label>
                    <input type="text" class="form-control" value="{{ $donhang->tongtien }}" name="tongtien"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter tongtien">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">image:</label>
                    <input type="file" accept="image/*" class="form-control" name="image" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter image" value="{{ old('image') }}">
                    <img style="width: 20%"
                        src="/storage/images/{{ isset($donhang->image_mathang) ? $donhang->image_mathang->file_nm : null }}"
                        alt="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="Company">mathang</label>
                    <select class="form-control" name="id_mathang">
                        @if (count($mathangs))
                            @foreach ($mathangs as $mathang)
                                <option value="{{ $mathang->id }}">{{ $mathang->name }}</option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
