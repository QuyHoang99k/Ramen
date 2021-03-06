@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Milo</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @php
                $brand =
                    auth()
                        ->guard('admin')
                        ->user()->brand == 1;
                $category =
                    auth()
                        ->guard('admin')
                        ->user()->category == 1;
                $product =
                    auth()
                        ->guard('admin')
                        ->user()->product == 1;
                $slider =
                    auth()
                        ->guard('admin')
                        ->user()->slider == 1;
                $coupons =
                    auth()
                        ->guard('admin')
                        ->user()->coupons == 1;
                $shipping =
                    auth()
                        ->guard('admin')
                        ->user()->shipping == 1;
                $blog =
                    auth()
                        ->guard('admin')
                        ->user()->blog == 1;
                $setting =
                    auth()
                        ->guard('admin')
                        ->user()->setting == 1;
                $returnorder =
                    auth()
                        ->guard('admin')
                        ->user()->returnorder == 1;
                $review =
                    auth()
                        ->guard('admin')
                        ->user()->review == 1;
                $orders =
                    auth()
                        ->guard('admin')
                        ->user()->orders == 1;
                $stock =
                    auth()
                        ->guard('admin')
                        ->user()->stock == 1;
                $reports =
                    auth()
                        ->guard('admin')
                        ->user()->reports == 1;
                $alluser =
                    auth()
                        ->guard('admin')
                        ->user()->alluser == 1;
                $adminuserrole =
                    auth()
                        ->guard('admin')
                        ->user()->adminuserrole == 1;

            @endphp

            @if ($brand == true)
                <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-solid fa-map-location"></i>
                        <span>Khu V???c<u></u></span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.brand' ? 'active' : '' }}"><a
                                href="{{ route('all.brand') }}"><i class="ti-more"></i>Danh S??ch Khu V???c</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if ($category == true)
                <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">

                    <a href="#">
                        <i class="fa-duotone fa-list-dropdown"></i> <span>Danh M???c</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a
                                href="{{ route('all.category') }}"><i class="ti-more"></i>T???t c??? danh m???c</a>
                        </li>
                        <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}"><a
                                href="{{ route('all.subcategory') }}"><i class="ti-more"></i>danh m???c nh???</a>
                        </li>
                        <li class="{{ $route == 'all.subsubcategory' ? 'active' : '' }}"><a
                                href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>danh m???c nh???
                                -> danh m???c con</a></li>
                    </ul>
                </li>
            @endif
            @if ($product == true)
                <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>S???n ph???m</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'add-product' ? 'active' : '' }}"><a
                                href={{ route('add-product') }}><i class="ti-more"></i>Th??m S???n Ph???m</a></li>
                        <li class="{{ $route == 'manage-product' ? 'active' : '' }}"><a
                                href={{ route('manage-product') }}><i class="ti-more"></i>Qu???n L?? S???n Ph???m</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($slider == true)
                <li class="treeview {{ $prefix == '/slider' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Slider</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage-slider' ? 'active' : '' }}"><a
                                href={{ route('manage-slider') }}><i class="ti-more"></i>Qu???n L?? Slider</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($coupons == true)
                <li class="treeview {{ $prefix == '/coupons' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>M?? gi???m gi??</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage-coupon' ? 'active' : '' }}"><a
                                href={{ route('manage-coupon') }}><i class="ti-more"></i>Qu???n l?? m?? gi???m
                                gi??</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($shipping == true)
                <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>V???n chuy???n</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage-division' ? 'active' : '' }}"><a
                                href={{ route('manage-division') }}><i class="ti-more"></i>T???nh/Th??nh Ph???</a>
                        </li>
                        <li class="{{ $route == 'manage-district' ? 'active' : '' }}"><a
                                href={{ route('manage-district') }}><i class="ti-more"></i>Qu???n/Huy???n</a>
                        </li>
                        <li class="{{ $route == 'manage-state' ? 'active' : '' }}"><a
                                href={{ route('manage-state') }}><i class="ti-more"></i>Ph?????ng/X??</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if ($blog == true)
                <li class="treeview {{ $prefix == '/blog' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Qu???n l?? b??i vi???t</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'blog.category' ? 'active' : '' }}"><a
                                href={{ route('blog.category') }}><i class="ti-more"></i>Danh m???c b??i vi???t</a>
                        </li>
                        <li class="{{ $route == 'list.post' ? 'active' : '' }}"><a
                                href={{ route('list.post') }}><i class="ti-more"></i>Danh s??ch b??i vi???t</a>
                        </li>
                        <li class="{{ $route == 'add.post' ? 'active' : '' }}"><a href={{ route('add.post') }}><i
                                    class="ti-more"></i>Th??m b??i vi???t</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($setting == true)
                <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Qu???n L?? th??ng tin Web</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'site.setting' ? 'active' : '' }}"><a
                                href={{ route('site.setting') }}><i class="ti-more"></i>C??i ?????t th??ng tin</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if ($returnorder == true)
                <li class="treeview {{ $prefix == '/return' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>????n h??ng ho??n tr???</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'return.request' ? 'active' : '' }}"><a
                                href={{ route('return.request') }}><i class="ti-more"></i>X??? l?? ho??n tr???</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if ($review == true)
                <li class="treeview {{ $prefix == '/review' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Qu???n l?? ????nh gi??</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all-review' ? 'active' : '' }}"><a
                                href={{ route('all-review') }}><i class="ti-more"></i>????nh gi?? ch??? ph??
                                duy???t</a>
                        </li>
                        <li class="{{ $route == 'publish.review' ? 'active' : '' }}"><a
                                href="{{ route('publish.review') }}"><i class="ti-more"></i>Danh s??ch c??c b??i
                                ????nh gi??</a>
                        </li>


                    </ul>
                </li>
            @endif

            <li class="header nav-small-cap">Qu???n L?? Ng?????i D??ng</li>
            @if ($orders == true)
                <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>????n ?????t h??ng</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'pending-orders' ? 'active' : '' }}"><a
                                href={{ route('pending-orders') }}><i class="ti-more"></i>????n h??ng ch??a gi???i
                                quy???t</a>
                        </li>
                        <li class="{{ $route == 'confirmed-orders' ? 'active' : '' }}"><a
                                href={{ route('confirmed-orders') }}><i class="ti-more"></i>????n h??ng ???? x??c
                                nh???n</a>
                        </li>
                        <li class="{{ $route == 'delivered-orders' ? 'active' : '' }}"><a
                                href={{ route('delivered-orders') }}><i class="ti-more"></i>????n h??ng ????
                                giao</a>
                        </li>
                        <li class="{{ $route == 'cancel-orders' ? 'active' : '' }}"><a
                                href={{ route('cancel-orders') }}><i class="ti-more"></i>????n h??ng b??? h???y</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($stock == true)
                <li class="treeview {{ $prefix == '/stock' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Qu???n l?? s??? l?????ng</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'product.stock' ? 'active' : '' }}"><a
                                href={{ route('product.stock') }}><i class="ti-more"></i>S??? l?????ng s???n ph???m</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($reports == true)
                <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>T??m ki???m ????n h??ng</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all-reports' ? 'active' : '' }}"><a
                                href={{ route('all-reports') }}><i class="ti-more"></i>T??m theo ng??y th??ng
                                n??m</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($alluser == true)
                <li class="treeview {{ $prefix == '/alluser' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Ng?????i D??ng</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all-user' ? 'active' : '' }}"><a href={{ route('all-user') }}><i
                                    class="ti-more"></i>Danh s??ch ng?????i d??ng</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($adminuserrole == true)
                <li class="treeview {{ $prefix == '/adminuserrole' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Nh??nh ADM qu???n tr???</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.admin.user' ? 'active' : '' }}"><a
                                href={{ route('all.admin.user') }}><i class="ti-more"></i>Danh s??ch qu???n tr???
                                vi??n</a>
                        </li>

                    </ul>
                </li>
            @endif

        </ul>
    </section>
    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
