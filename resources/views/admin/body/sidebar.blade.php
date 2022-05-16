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
                        <span>Khu Vực<u></u></span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.brand' ? 'active' : '' }}"><a
                                href="{{ route('all.brand') }}"><i class="ti-more"></i>Danh Sách Khu Vực</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if ($category == true)
                <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">

                    <a href="#">
                        <i class="fa-duotone fa-list-dropdown"></i> <span>Danh Mục</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a
                                href="{{ route('all.category') }}"><i class="ti-more"></i>Tất cả danh mục</a>
                        </li>
                        <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}"><a
                                href="{{ route('all.subcategory') }}"><i class="ti-more"></i>danh mục nhỏ</a>
                        </li>
                        <li class="{{ $route == 'all.subsubcategory' ? 'active' : '' }}"><a
                                href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>danh mục nhỏ
                                -> danh mục con</a></li>
                    </ul>
                </li>
            @endif
            @if ($product == true)
                <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Sản phẩm</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'add-product' ? 'active' : '' }}"><a
                                href={{ route('add-product') }}><i class="ti-more"></i>Thêm Sản Phẩm</a></li>
                        <li class="{{ $route == 'manage-product' ? 'active' : '' }}"><a
                                href={{ route('manage-product') }}><i class="ti-more"></i>Quản Lý Sản Phẩm</a>
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
                                href={{ route('manage-slider') }}><i class="ti-more"></i>Quản Lý Slider</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($coupons == true)
                <li class="treeview {{ $prefix == '/coupons' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Mã giảm giá</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage-coupon' ? 'active' : '' }}"><a
                                href={{ route('manage-coupon') }}><i class="ti-more"></i>Quản lý mã giảm
                                giá</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($shipping == true)
                <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Vận chuyển</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'manage-division' ? 'active' : '' }}"><a
                                href={{ route('manage-division') }}><i class="ti-more"></i>Tỉnh/Thành Phố</a>
                        </li>
                        <li class="{{ $route == 'manage-district' ? 'active' : '' }}"><a
                                href={{ route('manage-district') }}><i class="ti-more"></i>Quận/Huyện</a>
                        </li>
                        <li class="{{ $route == 'manage-state' ? 'active' : '' }}"><a
                                href={{ route('manage-state') }}><i class="ti-more"></i>Phường/Xã</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if ($blog == true)
                <li class="treeview {{ $prefix == '/blog' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Quản lý bài viết</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'blog.category' ? 'active' : '' }}"><a
                                href={{ route('blog.category') }}><i class="ti-more"></i>Danh mục bài viết</a>
                        </li>
                        <li class="{{ $route == 'list.post' ? 'active' : '' }}"><a
                                href={{ route('list.post') }}><i class="ti-more"></i>Danh sách bài viết</a>
                        </li>
                        <li class="{{ $route == 'add.post' ? 'active' : '' }}"><a href={{ route('add.post') }}><i
                                    class="ti-more"></i>Thêm bài viết</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($setting == true)
                <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Quản Lý thông tin Web</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'site.setting' ? 'active' : '' }}"><a
                                href={{ route('site.setting') }}><i class="ti-more"></i>Cài đặt thông tin</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if ($returnorder == true)
                <li class="treeview {{ $prefix == '/return' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Đơn hàng hoàn trả</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'return.request' ? 'active' : '' }}"><a
                                href={{ route('return.request') }}><i class="ti-more"></i>Xử lý hoàn trả</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if ($review == true)
                <li class="treeview {{ $prefix == '/review' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Quản lý đánh giá</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all-review' ? 'active' : '' }}"><a
                                href={{ route('all-review') }}><i class="ti-more"></i>Đánh giá chờ phê
                                duyệt</a>
                        </li>
                        <li class="{{ $route == 'publish.review' ? 'active' : '' }}"><a
                                href="{{ route('publish.review') }}"><i class="ti-more"></i>Danh sách các bài
                                đánh giá</a>
                        </li>


                    </ul>
                </li>
            @endif

            <li class="header nav-small-cap">Quản Lý Người Dùng</li>
            @if ($orders == true)
                <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Đơn đặt hàng</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'pending-orders' ? 'active' : '' }}"><a
                                href={{ route('pending-orders') }}><i class="ti-more"></i>Đơn hàng chưa giải
                                quyết</a>
                        </li>
                        <li class="{{ $route == 'confirmed-orders' ? 'active' : '' }}"><a
                                href={{ route('confirmed-orders') }}><i class="ti-more"></i>Đơn hàng đã xác
                                nhận</a>
                        </li>
                        <li class="{{ $route == 'delivered-orders' ? 'active' : '' }}"><a
                                href={{ route('delivered-orders') }}><i class="ti-more"></i>Đơn hàng đã
                                giao</a>
                        </li>
                        <li class="{{ $route == 'cancel-orders' ? 'active' : '' }}"><a
                                href={{ route('cancel-orders') }}><i class="ti-more"></i>Đơn hàng bị hủy</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($stock == true)
                <li class="treeview {{ $prefix == '/stock' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Quản lý số lượng</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'product.stock' ? 'active' : '' }}"><a
                                href={{ route('product.stock') }}><i class="ti-more"></i>Số lượng sản phẩm</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($reports == true)
                <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Tìm kiếm đơn hàng</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all-reports' ? 'active' : '' }}"><a
                                href={{ route('all-reports') }}><i class="ti-more"></i>Tìm theo ngày tháng
                                năm</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($alluser == true)
                <li class="treeview {{ $prefix == '/alluser' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Người Dùng</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all-user' ? 'active' : '' }}"><a href={{ route('all-user') }}><i
                                    class="ti-more"></i>Danh sách người dùng</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if ($adminuserrole == true)
                <li class="treeview {{ $prefix == '/adminuserrole' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Nhánh ADM quản trị</span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.admin.user' ? 'active' : '' }}"><a
                                href={{ route('all.admin.user') }}><i class="ti-more"></i>Danh sách quản trị
                                viên</a>
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
