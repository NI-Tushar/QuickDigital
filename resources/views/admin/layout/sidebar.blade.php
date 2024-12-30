<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span>General</span><i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i></li>

            @php
            $active = Session::get('page') == 'dashboard' ? 'active' : '';
            @endphp

            <li class="nav-item {{ $active }}"><a href="{{ url('admin/dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>


            <!-- @php
            $active = Session::get('page') == 'cms-page' ? 'active' : '';
            @endphp
            <li class="nav-item {{ $active }}"><a href="{{ url('admin/cms-page') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="CmsPage">CMS PAGE</span></a></li> -->

            @if(Auth::guard('admin')->user()->type=="admin")
            @php
            $active = Session::get('page') == 'subadmins' || Session::get('page') == 'add_subadmin' ? 'active' : '';
            @endphp

            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="SubAdmins">Sub-Admins</span></a>
                <ul class="menu-content">
                    @php
                    $active = Session::get('page') == 'subadmins' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/subadmins') }}" data-i18n="Vertical">Manage Sub-Admin</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add_subadmin' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/add-edit-subadmin') }}" data-i18n="Vertical">Add Sub-Admin</a>
                    </li>
                </ul>
            </li>
            @endif
            @php
            $active = Session::get('page') == 'users' || Session::get('page') == 'add_users' ? 'active' : '';
            @endphp
            <!-- <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Users">Students</span></a>
                <ul class="menu-content">
                    @php
                    $active = Session::get('page') == 'users' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/users') }}" data-i18n="Vertical">Manage Students</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add_users' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/add-edit-user') }}" data-i18n="Vertical">Add Students</a>
                    </li>
                </ul>
            </li> -->

            @php
            $active = Session::get('page') == 'instructors' || Session::get('page') == 'instructor_requests' ? 'active' : '';
            @endphp
            <!-- <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Users">Instructors</span></a>
                <ul class="menu-content">
                    @php
                    $newRequestsCount = App\Http\Controllers\Admin\InstructorRequestController::newRequestCount();
                    $active = Session::get('page') == 'instructor_requests' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/instructor-requests') }}" data-i18n="Vertical" style="display: flex; align-items: center;">
                            Instructor Request
                            @if($newRequestsCount > 0)
                            <span class="badge badge-pill badge-glow badge-success badge-center" style="margin-left: 14px;">{{ $newRequestsCount }}</span>
                            @endif
                        </a>
                    </li>
                    @php
                    $active = Session::get('page') == 'instructors' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/instructors') }}" data-i18n="Vertical">Manage Instructors</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add_users' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/add-edit-user') }}" data-i18n="Vertical">Add Instructor</a>
                    </li>
                </ul>
            </li> -->

            @php
            $active = Session::get('page') == 'ebooks' || Session::get('page') == 'add_ebook' ? 'active' : '';
            @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Users">E-books</span></a>
                <ul class="menu-content">
                    @php
                    $active = Session::get('page') == 'ebooks' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/ebooks') }}" data-i18n="Vertical">Manage E-books</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add_ebook' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/add-edit-ebook') }}" data-i18n="Vertical">Add E-book</a>
                    </li>
                </ul>
            </li>

            <!-- @php
            $active = Session::get('page') == 'order' ? 'active' : '';
            @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-file-text"></i><span class="menu-title" data-i18n="Users">EBOOK ORDER</span></a>
                <ul class="menu-content">
                    @php
                    $active = Session::get('page') == 'order' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/orders') }}" data-i18n="Vertical">VIEW EBOOK ORDER LIST</a>
                    </li>
                </ul>
            </li>

            @php
            $active = Session::get('page') == 'subscription' || Session::get('page') == 'add_subscription' ? 'active' : '';
            @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-award"></i><span class="menu-title" data-i18n="Users">Subscription Packages</span></a>
                <ul class="menu-content">
                    @php
                    $active = Session::get('page') == 'subscription' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/subscription') }}" data-i18n="Vertical">Manage Subscription Packages</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add_subscription' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/add-edit-subscription') }}" data-i18n="Vertical">Add Subscription Packages</a>
                    </li>
                </ul>
            </li>

            @php
            $active = Session::get('page') == 'mobile-video' || Session::get('page') == 'add_ebook' ? 'active' : '';
            @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-monitor"></i><span class="menu-title" data-i18n="Users">COURSE ORDER</span></a>
                <ul class="menu-content">
                    @php
                    $active = Session::get('page') == 'mobile-video' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/mobile-video-course-order') }}" data-i18n="Vertical">VIEW ORDER LIST</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add_ebook' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/add-edit-ebook') }}" data-i18n="Vertical">Add E-book</a>
                    </li>
                </ul>
            </li> -->

              <!-- ____________________ QUICKBUSINESS -->
              @php
              $active = Session::get('page') == 'affiliator' ? 'active' : '';
              @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Users">QuickBusiness</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('bootcamp.index') }}" data-i18n="Vertical">Registration List</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('bootcamp.affiliators') }}" data-i18n="Vertical">Affiliator List</a>
                    </li>
                </ul>
            </li>

            <!-- ____________________ SOFTWARE -->
            @php
              $active = Session::get('page') == 'software' ? 'active' : '';
              @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Users">Software</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('software.add') }}" data-i18n="Vertical">Add Software</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('software.list') }}" data-i18n="Vertical">Software List</a>
                    </li>
                </ul>
            </li>
            <!-- ____________________ DIGITAL PRODUCT -->
            @php
              $active = Session::get('page') == 'digitalProduct' ? 'active' : '';
              @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Users">Digital Product</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('digProduct.add') }}" data-i18n="Vertical">Add Digital Product</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('digProduct.list') }}" data-i18n="Vertical">Digital Product List</a>
                    </li>
                </ul>
            </li>

            {{-- Digital Service --}}
            @php
              $active = Session::get('page') == 'DigitalService' ? 'active' : '';
              @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Users">Digital Services</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.digialservice.index') }}" data-i18n="Vertical">Orders</a>
                    </li>
                </ul>
            </li>

            @php
            $active = Session::get('page') == 'productCategory'||Session::get('page') == 'order_product'||Session::get('page') == 'products'||Session::get('page') == 'add-edit-product' || Session::get('page') == 'add-edit-category' ? 'active' : '';
            @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Users">Quick Shop</span></a>
                {{-- <ul class="menu-content">
                    @php
                    $active = Session::get('page') == 'productCategory' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/product-category') }}" data-i18n="Vertical">Manage Category</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add-edit-category' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/add-edit-product-category') }}" data-i18n="Vertical">Add/Edit Category</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'products' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/products') }}" data-i18n="Vertical">Manage Products</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add-edit-product' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/add-edit-product') }}" data-i18n="Vertical">Add/Edit Product</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'order_product' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('admin/product/orders') }}" data-i18n="Vertical">Product Order</a>
                    </li>
                </ul> --}}

                <ul class="menu-content">

                    <li>
                        <a class="menu-item" href="{{ route('quick-shopping-category.index') }}" data-i18n="Vertical">Manage Categories</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('quick-shopping-product.index') }}" data-i18n="Vertical">Manage Products</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('quick-shopping-order.index') }}" data-i18n="Vertical">All  Orders</a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</div>
