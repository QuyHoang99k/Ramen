<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>
                                @if (session()->get('language') == 'japan')
                                    アカウント
                                @else
                                    Tài Khoản
                                @endif
                            </a></li>
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>
                                @if (session()->get('language') == 'japan')
                                    お気に入り
                                @else
                                    Yêu Thích
                                @endif
                            </a></li>
                        <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>
                                @if (session()->get('language') == 'japan')
                                    カート
                                @else
                                    Giỏ Hàng
                                @endif

                            </a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>
                                @if (session()->get('language') == 'japan')
                                    お支払い
                                @else
                                    Thanh Toán
                                @endif
                            </a></li>


                        <li>
                            @auth
                                <a href="{{ route('login') }}"><i class="icon fa fa-user"></i>
                                    @if (session()->get('language') == 'japan')
                                        プロファイル
                                    @else
                                        Thông tin người dùng
                                    @endif
                                </a>
                            @else
                                <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                                    @if (session()->get('language') == 'japan')
                                        ログイン/登録
                                    @else
                                        Đăng nhập / Đăng ký
                                    @endif

                                </a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                data-toggle="dropdown"><span class="value">
                                    @if (session()->get('language') == 'japan')
                                        言語
                                    @else
                                        Ngôn Ngữ
                                    @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (session()->get('language') == 'japan')
                                    <li><a href="{{ route('tiengViet.language') }}">Tiếng Việt</a></li>
                                @else
                                    <li><a href="{{ route('japan.language') }}">日本語</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    @php
                        $setting = App\Models\SiteSetting::find(1);
                    @endphp
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{ url('/') }}"> <img style="width:70px;height:40px"
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="POST" action="{{ route('product.search') }}">
                            @csrf
                            <div class="control-group">

                                <input class="search-field" onfocus="search_result_show()"
                                    onblur="search_result_hide()" id="search" name="search"
                                    placeholder="Nhập Tên Sản Phẩm...." />
                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                        <div id="searchProducts"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- SHOPPING CART DROPDOWN -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                        class="total-price">
                                        <span class="value" id="cartSubTotal"></span><span
                                            class="sign">円</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                {{-- Mini Cart Start with Ajax --}}
                                <div id="minicart">

                                </div>
                                {{-- End Mini Cart Start with Ajax --}}

                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span
                                            class='price' id="cartSubTotal"></span><span>円</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}"
                                        data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><i
                                            class="fa-solid fa-house-blank"></i>
                                        @if (session()->get('language') == 'japan')
                                            ホーム
                                        @else
                                            Trang Chủ
                                        @endif
                                    </a> </li>
                                {{-- Get Categoris --}}
                                @php
                                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                @endphp
                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu"> <a href="{{ url('/') }}"
                                            data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                            @if (session()->get('language') == 'japan')
                                                {{ $category->category_name_ja }}
                                            @else
                                                {{ $category->category_name_en }}
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        {{-- Get SubCategoris --}}
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                                ->orderBy('subcategory_name_en', 'ASC')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($subcategories as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                <a
                                                                    href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->subcategory_slug_en) }}">
                                                                    <h2 class="title">
                                                                        @if (session()->get('language') == 'japan')
                                                                            {{ $subcategory->subcategory_name_ja }}
                                                                        @else
                                                                            {{ $subcategory->subcategory_name_en }}
                                                                        @endif

                                                                    </h2>
                                                                </a>
                                                                {{-- Get SubSubCategoris --}}

                                                                @php
                                                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                                                        ->orderBy('subsubcategory_name_en', 'ASC')
                                                                        ->get();
                                                                @endphp
                                                                @foreach ($subsubcategories as $subsubcategory)
                                                                    <ul class="links">
                                                                        <li><a style="text-transform:capitalize"
                                                                                href="{{ url('subsubcategory/product/' . $subsubcategory->id . '/' . $subsubcategory->subsubcategory_slug_en) }}">
                                                                                @if (session()->get('language') == 'japan')
                                                                                    {{ $subsubcategory->subsubcategory_name_ja }}
                                                                                @else
                                                                                    {{ $subsubcategory->subsubcategory_name_en }}
                                                                                @endif
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                        <!-- /.col -->
                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="assets/images/banners/top-menu-banner.jpg" alt="">
                                                        </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                                <li class="dropdown  navbar-right special-menu"><a href="{{ route('home.blog') }}"><i
                                            class="fa-duotone fa-newspaper"></i>
                                        @if (session()->get('language') == 'japan')
                                            ニュース
                                        @else
                                            Tin tức
                                        @endif

                                    </a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>


<style>
    .search-area {
        position: relative;
    }

    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }

</style>


<script>
    function search_result_hide() {
        $("#searchProducts").slideUp();
    }

    function search_result_show() {
        $("#searchProducts").slideDown();
    }
</script>
