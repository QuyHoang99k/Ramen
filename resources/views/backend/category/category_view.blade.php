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
                        <h3 class="box-title">Danh Sách Danh Mục<span class="badge badge-pill badge-danger">
                                {{ count($category) }} </span></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Icon Danh Mục</th>
                                        <th>Danh Mục Tiếng Việt</th>
                                        <th>Danh Mục Tiếng Nhật</th>
                                        <th>Quản Lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td> <span><i class="{{ $item->category_icon }}"></i></span></td>
                                            <td>{{ $item->category_name_en }}</td>
                                            <td>{{ $item->category_name_ja }}</td>

                                            <td>
                                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info"
                                                    title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('category.delete', $item->id) }}" class="btn btn-danger"
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
                        <h3 class="box-title">Thêm Danh Mục</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Danh Mục Tiếng Việt<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en" class="form-control">
                                        @error('category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Danh Mục Tiếng Nhật<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_ja" class="form-control">
                                        @error('category_name_ja')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Icon Danh Mục<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control">
                                        @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Thêm Mới">
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
