@extends ('admin_layout')
@section('content')

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
        {{-- {{ dd($data)->links() }} --}}
        <tbody>
            <form action="" method="post">
                @csrf
                
                @foreach ($datas as $data)
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
    {{ $datas->links('pagination::bootstrap-4') }}
@endsection
