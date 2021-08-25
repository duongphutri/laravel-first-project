@extends ('admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('admin.chitietdonhang.create') }}">create</a>
                <button type="submit">DeleteAll</button>

                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">*</th>
                                    <th scope="col">id</th>
                                    <th scope="col">donhang</th>
                                    <th scope="col">ngaymua</th>
                                    <th scope="col">Tên Mặt Hàng</th>
                                    <th scope="col">soluong</th>
                                    <th scope="col">gia</th>
                                    <th scope="col">thanhtien</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('admin.chitietdonhang.destroyAllchitietdonhang') }}" method="post">
                                    @csrf
                                    @foreach ($chitietdonhangs as $chitietdonhang)
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="vehicle1" name="deletedonhang[]"
                                                    value="{{ $chitietdonhang->id }}">
                                            </td>
                                            <th scope="row">
                                                {{ $chitietdonhang->id }}
                                            </th>
                                            <td>{{ $chitietdonhang->id_donhang }}</td>
                                            <td>{{ $chitietdonhang->donhang ? $chitietdonhang->donhang->mathangs->name : 'NULL' }}
                                            </td>
                                            <td>{{ $chitietdonhang->donhang ? $chitietdonhang->donhang->ngaymua : 'NULL' }}
                                            </td>
                                            <td>{{ $chitietdonhang->donhang ? $chitietdonhang->donhang->mathangs->soluong : 'NULL' }}
                                            </td>
                                            <td>{{ $chitietdonhang->donhang ? $chitietdonhang->donhang->gia : 'NULL' }}
                                            </td>
                                            <td>{{ $chitietdonhang->thanhtien }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.chitietdonhang.show', ['chitietdonhang' => $chitietdonhang]) }}">view</a>
                                                <a
                                                    href="{{ route('admin.chitietdonhang.edit', ['chitietdonhang' => $chitietdonhang]) }}">edit</a>
                                                <a
                                                    href="{{ route('admin.chitietdonhang.destroy', ['chitietdonhang' => $chitietdonhang]) }}">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                        {!! $chitietdonhangs->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
