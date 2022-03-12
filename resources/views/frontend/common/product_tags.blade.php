@php

$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();

$tags_ja = App\Models\Product::groupBy('product_tags_ja')->select('product_tags_ja')->get();
@endphp




     <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">

<div class="tag-list">

@if(session()->get('language') == 'japan')

@foreach($tags_ja as $tag)
<a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_ja) }}">
	{{ str_replace(',',' ',$tag->product_tags_ja)  }}</a>
@endforeach

 @else

@foreach($tags_en as $tag)
<a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_en) }}">
	{{ str_replace(',',' ',$tag->product_tags_en)  }}</a>
@endforeach

  @endif

	 </div>
<!-- /.tag-list -->
</div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
