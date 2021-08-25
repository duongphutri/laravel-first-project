@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.mathang.update', ['mathang' => $mathang]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" value="{{ $mathang->name }}" name="name"
                        placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">image:</label>
                    <input type="file" accept="image/*" class="form-control" name="image" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter image" value="{{ old('image') }}">
                    <img style="width: 20%"
                        src=" /storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}"
                        alt="">
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">create</label>
                    <input type="text" class="form-control" value="{{ $mathang->created_by }}" name="created_by"
                         placeholder="Enter created_by">
                </div> --}}

                <div class="form-group">
                    <label class="control-label" for="Company">Sản Phẩm</label>
                    <select class="form-control" name="category_id">
                        @if (count($products))
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">soluong</label>
                    <input type="text" class="form-control" value="{{ $mathang->soluong }}" name="soluong"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter soluong">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">gia</label>
                    <input type="text" class="form-control" value="{{ $mathang->gia }}" name="gia" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter gia">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">is_sale</label>
                    <input type="text" class="form-control" value="{{ $mathang->is_sale }}" name="is_sale"
                        placeholder="Enter sale">
                    <label for="exampleInputEmail1">is_hot</label>
                    <input type="text" class="form-control" value="{{ $mathang->is_hot }}" name="is_hot"
                        placeholder="Enter hot ">
                    <label for="exampleInputEmail1">is_new</label>
                    <input type="text" class="form-control" value="{{ $mathang->is_new }}" name="is_new"
                        placeholder="Enter new">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" value="0" class="form-check-input" name="is_show"
                            {{ !$mathang->is_show ? 'checked' : '' }}>hide
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" value="1" class="form-check-input" name="is_show"
                            {{ $mathang->is_show ? 'checked' : '' }}>show
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
