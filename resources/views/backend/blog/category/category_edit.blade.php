@extends('admin.admin_master')
@section('admin')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <section class="content">
        <div class="row">



            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chỉnh sửa danh mục bài viết</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('blog.category.update') }}"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $blogcategory->id }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Tên Danh Mục Bài Viết Tiếng Việt<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_vn" class="form-control"
                                            value="{{ $blogcategory->blog_category_name_vn }}">
                                        @error('blog_category_name_vn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tên Danh Mục Bài Viết Tiếng Nhật <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_ja" class="form-control"
                                            value="{{ $blogcategory->blog_category_name_ja }}">
                                        @error('blog_category_name_ja')
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
