@extends ('admin_layout')
@section('content')

    <body>
        <table class="table table-hover" border="1">
            <thead>
                <tr>
                    <th>*</th>
                    <th>STT</th>
                    <th>Id</th>
                    <th>name mail</th>
                    <th>nameroute</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('chucnang.index', ['data' => $data]) }}" method="post">
                    @csrf
                    @foreach ($data as $data)
                        <tr>
                            <td>
                                <input type="checkbox" id="vehicle1" name="deletedata[]" value="{{ $data->id }}">
                            </td>
                            <th scope="row">
                                {{ $loop->iteration }}
                            </th>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->user->name ?? '' }}</td>
                            <td> {{ $data->nameroute }} </td>
                            <td>
                                {{-- {{ dd($data) }} --}}
                                <a href=" {{ route('chucnang.edit', $data->id) }} ">edit</a>
                                <a href=" {{ route('chucnang.destroy', $data->id) }} ">delete</a>

                            </td>
                    @endforeach

                    </tr>
                </form>
                <a href=" {{ route('chucnang.create') }} ">Create</a>

            </tbody>
        </table>
        {{-- {!! $data->links('pagination::bootstrap-4') !!} --}}
    </body>
@endsection
