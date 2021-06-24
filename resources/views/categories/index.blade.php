@extends ('layouts.app')
@section('content')
    <a class="btn btn-primary" href="{{ route('categories.create') }}">create</a>

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}
                    </th>
                    <td>
                        <a href="{{ route('categories.children',['category' => $category]) }}">{{ $category->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('categories.show', ['category' => $category]) }}">view</a>
                        <a href="{{ route('categories.edit', ['category' => $category]) }}">edit</a>
                        <a href="{{ route('categories.destroy', ['category' => $category]) }}">delete</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
