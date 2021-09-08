@extends ('admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('admin.thongtin.create') }}">create</a>
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">size</th>
                                    <th scope="col">dungluong</th>
                                    <th scope="col">mau</th>
                                    <th scope="col">chitiet</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thongtins as $thongtin)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td>{{ $thongtin->size }}</td>
                                        <td>{{ $thongtin->dungluong }}</td>
                                        <td>{{ $thongtin->mau }}</td>
                                        <td>{{ $thongtin->chitiet }}</td>
                                        <td>
                                            <a
                                                href="{{ route('admin.thongtin.show', ['thongtin' => $thongtin]) }}">view</a>
                                            <a
                                                href="{{ route('admin.thongtin.edit', ['thongtin' => $thongtin]) }}">edit</a>
                                            <a
                                                href="{{ route('admin.thongtin.destroy', ['thongtin' => $thongtin]) }}">delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
