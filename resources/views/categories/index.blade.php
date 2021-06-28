@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('categories.create') }}">create</a>
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">ACTION</th>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
