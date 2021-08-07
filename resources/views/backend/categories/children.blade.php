@extends ('admin_layout')
@section('content')
    <a class="btn btn-primary" href="{{ route('admin.product.create') }}">create</a>

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">product</th>
            </tr>
        </thead>
        <tbody>
            @if (count($children))
                @foreach ($children as $child)
                    @if ($child->is_show)
                        <tr>
                            <th scope="row">
                                {{ $loop->iteration }}
                            </th>

                            <td>
                                <a href=" {{ route('admin.product.show', ['product' => $child]) }} ">
                                    {{ $child->name ? $child->name : 'NULL' }}
                                </a>
                            </td>
                            <td>
                                {{ $child->category ? $child->category->name : 'NULL' }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td>
                        <h3>No data....... Please Create</h3>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
