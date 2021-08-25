@extends ('admin_layout')
@section('content')
    <a class="btn btn-primary" href="{{ route('admin.mau.create') }}">create</a>
    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">mau</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maus as $mau)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}
                    </th>
                    <td>{{ $mau->mau }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.mau.show', ['mau' => $mau]) }}">view</a> --}}
                        <a href="{{ route('admin.mau.edit', ['mau' => $mau]) }}">edit</a>
                        <a href="{{ route('admin.mau.destroy', ['mau' => $mau]) }}">delete</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
