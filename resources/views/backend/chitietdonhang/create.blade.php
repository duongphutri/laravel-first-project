@extends ('admin_layout')
@section('content')
    <table>
        <div class="container">
            <form action="{{ route('admin.chitietdonhang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="control-label" for="Company">donhang</label>
                    <select class="form-control" name="id_donhang">
                        @if (count($donhangs))
                            @foreach ($donhangs as $donhang)
                                <option value="{{ $donhang->id }}"
                                    {{ old('id_donhang') == $donhang->id ? 'selected' : '' }}>
                                    {{ $donhang->nguoimua }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Company">Ngày Mua</label>
                    <select class="form-control" name="id_donhang">
                        @if (count($donhangs))
                            @foreach ($donhangs as $donhang)
                                <option value="{{ $donhang->id }}"
                                    {{ old('id_donhang') == $donhang->id ? 'selected' : '' }}>
                                    {{ $donhang->ngaymua }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Company">Tên Mặt Hàng</label>
                    <select class="form-control" name="id_donhang">
                        @if (count($donhangs))
                            @foreach ($donhangs as $donhang)
                                <option value="{{ $donhang->id }}"
                                    {{ old('id_donhang') == $donhang->id ? 'selected' : '' }}>
                                    {{ $donhang->mathangs ? $donhang->mathangs->name : 'NULL' }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Company">Số Lượng</label>
                    <select class="form-control" name="id_donhang">
                        @if (count($donhangs))
                            @foreach ($donhangs as $donhang)
                                <option value="{{ $donhang->id }}"
                                    {{ old('id_donhang') == $donhang->id ? 'selected' : '' }}>
                                    {{ $donhang->mathangs ? $donhang->mathangs->soluong > 0 : 'NULL' }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Company">giá</label>
                    <select class="form-control" name="id_donhang">
                        @if (count($donhangs))
                            @foreach ($donhangs as $donhang)
                                <option value="{{ $donhang->id }}"
                                    {{ old('id_donhang') == $donhang->id ? 'selected' : '' }}>
                                    {{ $donhang->mathangs ? $donhang->mathangs->gia : 'NULL' }}
                                </option>
                            @endforeach
                        @else
                            <option value="0">NULL</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </table>
@endsection
