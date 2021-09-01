@extends ('admin_layout')
@section('content')

    <form action=" {{ route('excel.excelimport') }} " method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="excel"><br>

        <a href="{{ route('exportexcel') }}">Xuất Báo Giá</a><br>

        <input type="submit" value="import"><br>
    </form>



@endsection
