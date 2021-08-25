{{-- {{ dd($data) }} --}}
@extends ('admin_layout')
@section('content')


    <body>

        <table class="table table-hover" border="1">
            <thead>
                <tr>
                    <th>*</th>
                    <th>STT</th>
                    <th>Id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('admin.user.index', ['data' => $data]) }}" method="post">
                    @csrf
                    @foreach ($data as $data)

                        <tr>
                            <td>
                                {{-- <input type="checkbox" id="vehicle1" name="deletedata[]" value="{{ $data->id }}"> --}}
                            </td>
                            <th scope="row">
                                {{ $loop->iteration }}
                            </th>
                            <td>{{ $data->id }}</td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->email }} </td>
                            <td> {{ $data->password }} </td>
                            <td>
                                {{-- {{ dd($data) }} --}}
                                <a href=" {{ route('admin.user.edit', ['data' => $data]) }} ">edit</a>
                                <a href=" {{ route('admin.user.destroy', ['data' => $data]) }} ">delete</a>

                            </td>
                        </tr>
                    @endforeach
                </form>
                <a href=" {{ route('admin.user.create') }} ">Create</a>

            </tbody>
        </table>
        {{-- {!! $data->links('pagination::bootstrap-4') !!} --}}
    </body>
@endsection
