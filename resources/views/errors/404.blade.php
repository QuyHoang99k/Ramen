@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
					<h1>404</h1>
					<p>Xin lỗi trang không tồn tại,vui lòng quay lại trang chủ </p>

					<a href="{{ url('/') }}"><i class="fa fa-home"></i> Trang Chủ</a>
				</div>
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection
