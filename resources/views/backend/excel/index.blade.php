@extends ('admin_layout')
@section('content')
    <table class="table table-hover" border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Id</th>
                <th>ten</th>
                <th>chungloai</th>
                <th>hang</th>
                <th>soluong</th>
                <th>thongtin</th>
                <th>dongia</th>
                <th>gichu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($baogias as $baogia)
                <tr>
                    <td scope="row">
                        {{ $loop->iteration }}
                    </td>
                    <td>{{ $baogia->id }}</td>
                    <td>{{ $baogia->ten }}</td>
                    <td>{{ $baogia->chungloai }}</td>
                    <td>{{ $baogia->hang }}</td>
                    <td>{{ $baogia->soluong }}</td>
                    <td>{{ $baogia->thongtin }}</td>
                    <td>{{ $baogia->dongia }}</td>
                    <td>{{ $baogia->ghichu }}</td>
                    <td>
                        <a href="{{ route('admin.baogia.destroy', $baogia->id) }}">Delete</a>
                        <a href="{{ route('admin.baogia.edit', ['baogia' => $baogia]) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </form>
            <a href=" {{ route('admin.baogia.create') }} ">Create</a><br>
            <a href="{{ route('excel.excelimport') }}">Import</a><br>
        </tbody>

    </table>
    {!! $baogias->links() !!}
@endsection
