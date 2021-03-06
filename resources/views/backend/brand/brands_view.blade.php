@extends('admin.admin_master')
@section('admin')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách khu vực</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Khu vực</th>
                                        <th>エリア</th>
                                        <th>Ảnh</th>
                                        <th>Hiện Thị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $item)
                                        <tr>
                                            <td>{{ $item->brand_name_en }}</td>
                                            <td>{{ $item->brand_name_ja }}</td>
                                            <td><img src="{{ asset($item->brand_image) }}" style="width: 90px;height:60px"
                                                    alt=""></td>
                                            <td>
                                                <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-info"
                                                    title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('brand.delete', $item->id) }}" class="btn btn-danger"
                                                    title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm thương hiệu</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Tên Khu Vực Tiếng Việt<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_en" class="form-control">
                                        @error('brand_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tên Khu Vực Tiếng Nhật<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_ja" class="form-control">
                                        @error('brand_name_ja')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Ảnh Khu Vực<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control">
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>
@endsection
