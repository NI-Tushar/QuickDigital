<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span>General</span><i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i></li>

            @php
            $active = Session::get('page') == 'dashboard' ? 'active' : '';
            @endphp

            <li class="nav-item {{ $active }}">
                <a href="{{ url('instructor/dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>



            @php
            $active = Session::get('page') == 'course' || Session::get('page') == 'course_category'|| Session::get('page') == 'add-edit-course' ? 'active' : '';
            @endphp
            <li class="nav-item {{ $active }}"><a href="#"><i class="feather icon-activity"></i><span class="menu-title" data-i18n="Users">Course Manager</span></a>
                <ul class="menu-content">

                    @php
                    $active = Session::get('page') == 'course' ? 'active' : '';
                    @endphp

                    <li class="nav-item {{ $active }}">
                        <a href="{{ url('instructor/manage-courses') }}"><i class="feather icon-airplay"></i><span class="menu-title" data-i18n="courses">Manage Courses</span></a>
                    </li>

                    @php
                    $active = Session::get('page') == 'add-edit-course' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('instructor/add-edit-course') }}" data-i18n="Vertical"><i class="feather icon-airplay"></i>Add New Course</a>
                    </li>

                    @php
                    $active = Session::get('page') == 'course_category' ? 'active' : '';
                    @endphp
                    <li class="{{ $active }}">
                        <a class="menu-item" href="{{ url('instructor/course-category') }}" data-i18n="Vertical"><i class="feather icon-airplay"></i>Category</a>
                    </li>


                </ul>
            </li>
        </ul>
        </li>
        </ul>
    </div>
</div>