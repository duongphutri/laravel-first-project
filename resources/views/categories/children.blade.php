
@extends ('layouts.app')
@section('content')
    <a class="btn btn-primary" href="{{ route('categories.create') }}">create</a>

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">product</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($children as $children)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}
                    </th>
                    <td>{{ $children->name ? $children->name : 'NULL' }}</td>
                    <td>{{ $children->category ? $children->category->name : 'NULL' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
