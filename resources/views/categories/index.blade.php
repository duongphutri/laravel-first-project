@extends ('layouts.app')
@section('content')
<a class="btn btn-primary" href="{{route('categories.create')}}">create</a>
 
    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categories)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}
                    </th>
                    <td>{{ $categories->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', ['category' => $categories]) }}">view</a>
                        <a href="{{ route('categories.edit', ['category' => $categories]) }}">edit</a>
                        <a href="{{ route('categories.destroy', ['category' => $categories]) }}">delete</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


