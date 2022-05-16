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
                        <h3 class="box-title">Danh Mục Bài Viết <span class="badge badge-pill badge-danger">
                                {{ count($blogcategory) }} </span></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Danh Mục Bài Viết Tiếng Việt</th>
                                        <th>Danh Mục Bài Viết Tiếng Nhật</th>
                                        <th>Quản Lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogcategory as $item)
                                        <tr>

                                            <td>{{ $item->blog_category_name_vn }}</td>
                                            <td>{{ $item->blog_category_name_ja }}</td>

                                            <td>
                                                <a href="{{ route('blog.category.edit', $item->id) }}"
                                                    class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i>
                                                </a>
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
                        <h3 class="box-title">Thêm Danh Mục Bài Viết</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('blog.category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Tên Danh Mục Bài Viết Tiếng Việt <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_vn" class="form-control">
                                        @error('blog_category_name_vn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tên Danh Mục Bài Viết Tiếng Nhật <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_ja" class="form-control">
                                        @error('blog_category_name_ja')
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
