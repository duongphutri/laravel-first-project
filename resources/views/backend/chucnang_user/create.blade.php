@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action=" {{ route('chucnang.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">nameemail:</label>
                    <select class="form-control form-control-lg" name="email">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-9 padding-right">
                    <span>categories:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.categories.index">
                        <label class="form-check-label" for="inlineCheckbox1">index</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.categories.show">
                        <label class="form-check-label" for="inlineCheckbox1">show</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.categories.create">
                        <label class="form-check-label" for="inlineCheckbox1">create</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.categories.store">
                        <label class="form-check-label" for="inlineCheckbox1">store</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.categories.edit">
                        <label class="form-check-label" for="inlineCheckbox1">edit</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.categories.update">
                        <label class="form-check-label" for="inlineCheckbox1">update</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.categories.destroy">
                        <label class="form-check-label" for="inlineCheckbox1">destroy</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.categories.children">
                        <label class="form-check-label" for="inlineCheckbox1">children</label>
                    </div>
                </div>
                <div>
                    <span>product:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.product.index">
                        <label class="form-check-label" for="inlineCheckbox1">index</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.product.show">
                        <label class="form-check-label" for="inlineCheckbox1">show</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.product.create">
                        <label class="form-check-label" for="inlineCheckbox1">create</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.product.store">
                        <label class="form-check-label" for="inlineCheckbox1">store</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.product.edit">
                        <label class="form-check-label" for="inlineCheckbox1">edit</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.product.update">
                        <label class="form-check-label" for="inlineCheckbox1">update</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.product.destroy">
                        <label class="form-check-label" for="inlineCheckbox1">destroy</label>
                    </div>

                </div>
                <div class="col-sm-9 padding-right">
                    <span>mathang:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.mathang.index">
                        <label class="form-check-label" for="inlineCheckbox1">index</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.mathang.show">
                        <label class="form-check-label" for="inlineCheckbox1">show</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.mathang.create">
                        <label class="form-check-label" for="inlineCheckbox1">create</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.mathang.store">
                        <label class="form-check-label" for="inlineCheckbox1">store</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.mathang.edit">
                        <label class="form-check-label" for="inlineCheckbox1">edit</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.mathang.update">
                        <label class="form-check-label" for="inlineCheckbox1">update</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.mathang.destroy">
                        <label class="form-check-label" for="inlineCheckbox1">destroy</label>
                    </div>

                </div>
                <div>
                    <span>donhang:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.donhang.index">
                        <label class="form-check-label" for="inlineCheckbox1">index</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.donhang.show">
                        <label class="form-check-label" for="inlineCheckbox1">show</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.donhang.create">
                        <label class="form-check-label" for="inlineCheckbox1">create</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.donhang.store">
                        <label class="form-check-label" for="inlineCheckbox1">store</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.donhang.edit">
                        <label class="form-check-label" for="inlineCheckbox1">edit</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.donhang.update">
                        <label class="form-check-label" for="inlineCheckbox1">update</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.donhang.destroy">
                        <label class="form-check-label" for="inlineCheckbox1">destroy</label>
                    </div>

                </div>
                <div>
                    <span>chitietdonhang:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.index">
                        <label class="form-check-label" for="inlineCheckbox1">index</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.show">
                        <label class="form-check-label" for="inlineCheckbox1">show</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.create">
                        <label class="form-check-label" for="inlineCheckbox1">create</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.store">
                        <label class="form-check-label" for="inlineCheckbox1">store</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.edit">
                        <label class="form-check-label" for="inlineCheckbox1">edit</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.update">
                        <label class="form-check-label" for="inlineCheckbox1">update</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.destroy">
                        <label class="form-check-label" for="inlineCheckbox1">destroy</label>
                    </div>
                </div>
                <div>
                    <span>user:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.user.index">
                        <label class="form-check-label" for="inlineCheckbox1">index</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.user.show">
                        <label class="form-check-label" for="inlineCheckbox1">show</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.user.create">
                        <label class="form-check-label" for="inlineCheckbox1">create</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.user.store">
                        <label class="form-check-label" for="inlineCheckbox1">store</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.user.edit">
                        <label class="form-check-label" for="inlineCheckbox1">edit</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.user.update">
                        <label class="form-check-label" for="inlineCheckbox1">update</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.destroy">
                        <label class="form-check-label" for="inlineCheckbox1">destroy</label>
                    </div>
                </div>
                <div>
                    <span>Thông Tin:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.thongtin.index">
                        <label class="form-check-label" for="inlineCheckbox1">index</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.thongtin.show">
                        <label class="form-check-label" for="inlineCheckbox1">show</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.thongtin.create">
                        <label class="form-check-label" for="inlineCheckbox1">create</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.thongtin.store">
                        <label class="form-check-label" for="inlineCheckbox1">store</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.thongtin.edit">
                        <label class="form-check-label" for="inlineCheckbox1">edit</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.thongtin.update">
                        <label class="form-check-label" for="inlineCheckbox1">update</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="route[]"
                            value="admin.chitietdonhang.destroy">
                        <label class="form-check-label" for="inlineCheckbox1">destroy</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>

@endsection
