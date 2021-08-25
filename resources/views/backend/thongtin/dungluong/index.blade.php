@extends ('admin_layout')
@section('content')
    <a class="btn btn-primary" href="{{ route('admin.dungluong.create') }}">create</a>
    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">dungluong</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dungluongs as $dungluong)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}
                    </th>
                    <td>{{ $dungluong->dungluong }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.dungluong.show', ['dungluong' => $dungluong]) }}">view</a> --}}
                        <a href="{{ route('admin.dungluong.edit', ['dungluong' => $dungluong]) }}">edit</a>
                        <a href="{{ route('admin.dungluong.destroy', ['dungluong' => $dungluong]) }}">delete</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
