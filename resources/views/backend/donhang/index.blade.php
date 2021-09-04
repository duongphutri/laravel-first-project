@extends ('admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('admin.donhang.create') }}">create</a>
                <button type="submit">DeleteAll</button>
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">*</th>
                                    <th scope="col">id</th>
                                    {{-- <th scope="col">mathang</th> --}}
                                    <th scope="col">nguoimua</th>
                                    <th scope="col">sodienthoai</th>
                                    <th scope="col">diachi</th>
                                    <th scope="col">ngaymua</th>
                                    {{-- <th scope="col">soluong</th> --}}
                                    {{-- <th scope="col">tongtien</th> --}}
                                    <th scope="col">trangthai</th>
                                    {{-- <th scope="col">image</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('admin.donhang.destroyAlldonhang') }}" method="post">
                                    @csrf
                                    @foreach ($donhangs as $donhang)
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="vehicle1" name="deletedonhang[]"
                                                    value="{{ $donhang->id }}">
                                            </td>
                                            <th scope="row">
                                                {{ $donhang->id }}
                                            </th>
                                            {{-- <td>{{ $donhang->mathangs ? $donhang->mathangs->name : 'NULL' }}</td> --}}
                                            <td>{{ $donhang->nguoimua }}</td>
                                            <td>{{ $donhang->sodienthoai }}</td>
                                            <td>{{ $donhang->diachi }}</td>
                                            <td>{{ $donhang->ngaymua }}</td>
                                            {{-- <td>{{ $donhang->mathangs->soluong }}</td> --}}
                                            {{-- <td> {{ number_format($donhang->mathangs->soluong * $donhang->mathangs->gia) }} --}}
                                            </td>
                                            <td>{{ $donhang->trangthai }}</td>
                                            {{-- <td>
                                                <img style="width: 20%"
                                                    src="/storage/images/{{ isset($donhang->mathangs->image_mathang) ? $donhang->mathangs->image_mathang->file_nm : null }}  "
                                                    alt="">
                                            </td> --}}
                                            <td>
                                                <a
                                                    href="{{ route('admin.donhang.show', ['donhang' => $donhang]) }}">view</a>
                                                <a
                                                    href="{{ route('admin.donhang.edit', ['donhang' => $donhang]) }}">edit</a>
                                                <a
                                                    href="{{ route('admin.donhang.destroy', ['donhang' => $donhang]) }}">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                        {!! $donhangs->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
