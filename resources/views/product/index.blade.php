@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('product.create') }}">create</a>
                <button type="submit">DeleteAll</button>

                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">*</th>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">category</th>
                                    <th scope="col">image</th>
                                    <th scope="col">created</th>
                                    <th scope="col">Show</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('product.destroyAllProduct') }}" method="post">
                                    @csrf
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="vehicle1" name="deleteProduct[]"
                                                    value="{{ $product->id }}">
                                            </td>
                                            <th scope="row">
                                                {{ $product->id }}
                                            </th>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category ? $product->category->name : 'NULL' }}</td>
                                            <td>
                                                <img style="width: 20%" src="/{{ $product->image }}" alt="">
                                            </td>
                                            <td>{{ $product->created_by }}</td>
                                            <td>{{ $product->is_show ? 'true' : 'false' }}</td>
                                            <td>
                                                <a href="{{ route('product.show', ['product' => $product]) }}">view</a>
                                                <a href="{{ route('product.edit', ['product' => $product]) }}">edit</a>
                                                <a href="{{ route('product.destroy', ['product' => $product]) }}">delete</a>   
                                            </td>
                                        </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                        {!! $products->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
