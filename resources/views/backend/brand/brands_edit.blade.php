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
                        <h3 class="box-title">Sửa thương hiệu</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('brand.update', $brand->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $brand->id }}">
                                <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                                <div class="form-group">
                                    <h5>Tên Khu Vực Tiếng Việt<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $brand->brand_name_en }}" name="brand_name_en"
                                            class="form-control">
                                        @error('brand_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tên Khu Vực Tiếng Nhật<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $brand->brand_name_ja }}" name="brand_name_ja"
                                            class="form-control">
                                        @error('brand_name_ja')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Ảnh Khu Vực<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control">
                                        <img class="mt-2" src="{{ asset($brand->brand_image) }}" height="100"
                                            width="100" alt="">
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
