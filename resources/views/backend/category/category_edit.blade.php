@extends('admin.admin_master')
@section('admin')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sửa Danh Mục</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('category.update', $category->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <div class="form-group">
                                    <h5>Danh Mục Tiếng Việt <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input value="{{ $category->category_name_en }}" type="text"
                                            name="category_name_en" class="form-control">
                                        @error('category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Danh Mục Tiếng Nhật <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input value="{{ $category->category_name_ja }}" type="text"
                                            name="category_name_ja" class="form-control">
                                        @error('category_name_ja')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Icon Danh Mục <span class="text-danger">* <i
                                                class=" {{ $category->category_icon }} "></i></span></h5>
                                    <div class="controls">
                                        <input value="{{ $category->category_icon }}" type="text" name="category_icon"
                                            class="form-control">

                                        @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập Nhật">
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
