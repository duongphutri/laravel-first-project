@extends ('layouts.app') @section('content')
    <a class="btn btn-primary" href="{{ route('product.create') }}">create</a>

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">category</th>
                <th scope="col">created</th>
                <th scope="col">Show</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}
                    </th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category ? $product->category->name : 'NULL' }}</td>
                    <td>{{ $product->created_by }}</td>
                    <td>{{ $product->is_show ? 'true' : 'false' }}</td>
                    <td>
                        <a href="{{ route('product.show', ['product' => $product]) }}">view</a>
                        <a href="{{ route('product.edit', ['product' => $product]) }}">edit</a>
                        <a href="{{ route('product.destroy', ['product' => $product]) }}">delete</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
