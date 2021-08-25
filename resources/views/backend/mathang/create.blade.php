@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.mathang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" value="{{ old('name') }}" class="form-control" name="name" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label class="control-label" for="Company">product</label>
                    <select class="form-control" name="id_product">
                        @if (count($products))
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">image:</label>
                            <input type="file" accept="image/*" class="form-control" name="image" placeholder="Enter image"
                                value="{{ old('image') }}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">soluong</label>
                            <input type="text" value="{{ old('soluong') }}" class="form-control" name="soluong"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter soluong">
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">gia</label>
                            <input type="text" value="{{ old('gia') }}" class="form-control" name="gia"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter gia">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">is_sale</label>
                            <input type="text" value="{{ old('is_sale') }}" class="form-control" name="is_sale"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter is_sale">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">is_hot</label>
                            <input type="text" value="{{ old('is_hot') }}" class="form-control" name="is_hot"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter is_hot">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">is_new</label>
                            <input type="text" value="{{ old('is_new') }}" class="form-control" name="is_new"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter is_new">
                        </div>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">create</label>
                    <input type="text" value="{{ old('created_by') }}" class="form-control" name="created_by"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter create">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" value="{{ old('is_show') ?? '0' }}" class="form-check-input"
                            name="is_show">hide
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" value="{{ old('is_show') ?? '1' }}" class="form-check-input" name="is_show"
                            checked>show
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
