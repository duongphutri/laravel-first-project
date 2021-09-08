@extends ('admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('admin.mathang.create') }}">create</a>
                <button type="submit">DeleteAll</button>

                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">*</th>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    {{-- <th scope="col">soluong</th> --}}
                                    <th scope="col">Chủng Loại</th>
                                    <th scope="col">Sản Phẩm</th>
                                    <th scope="col">Thông Tin</th>
                                    <th scope="col">image</th>
                                    <th scope="col">gia</th>
                                    <th scope="col">is_sale</th>
                                    <th scope="col">is_hot</th>
                                    <th scope="col">is_new</th>
                                    <th scope="col">is_show</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('admin.mathang.destroyAllmathang') }}" method="post">
                                    @csrf
                                    @foreach ($mathangs as $mathang)
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="vehicle1" name="deletemathang[]"
                                                    value="{{ $mathang->id }}">
                                            </td>
                                            <th scope="row">
                                                {{ $mathang->id }}
                                            </th>
                                            <td>{{ $mathang->name }}</td>
                                            {{-- <td>{{ $mathang->soluong }}</td> --}}
                                            {{-- {{dd($mathang->thongtin->size)}} --}}
                                            <td>{{ $mathang->category ? $mathang->category->name : 'NULL' }}
                                            </td>
                                            <td>{{ $mathang->products ? $mathang->products->name : 'NULL' }}</td>
                                            <td>
                                                <p>{{ $mathang->thongtin ? $mathang->thongtin->size : 'NULL' }}</p>
                                                <p>{{ $mathang->thongtin ? $mathang->thongtin->dungluong : 'NULL' }}</p>
                                                <p>{{ $mathang->thongtin ? $mathang->thongtin->mau : 'NULL' }}</p>
                                                <p>{{ $mathang->thongtin ? $mathang->thongtin->chitiet : 'NULL' }}</p>
                                            <td>
                                                <img style="width: 20%"
                                                    src="/storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}  "
                                                    alt="">
                                            </td>
                                            <td>{{ number_format($mathang->gia) }}</td>
                                            <td>{{ $mathang->is_sale }}%</td>
                                            <td>{{ $mathang->is_hot }}</td>
                                            <td>{{ $mathang->is_new }}</td>
                                            <td>{{ $mathang->is_show ? 'true' : 'false' }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.mathang.show', ['mathang' => $mathang]) }}">view</a>
                                                <a
                                                    href="{{ route('admin.mathang.edit', ['mathang' => $mathang]) }}">edit</a>
                                                <a
                                                    href="{{ route('admin.mathang.destroy', ['mathang' => $mathang]) }}">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        {!! $mathangs->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
