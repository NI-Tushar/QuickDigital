    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('admin/dashboard') }}"><img class="brand-logo" alt="stack admin logo" src="{{ asset('admin/images/logo/stack-logo-light.png') }}">
                            <h2 class="brand-text">QD</h2>
                        </a></li>
                    <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon feather icon-toggle-right font-medium-3 white" data-ticon="feather.icon-toggle-right"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>
                            <ul class="mega-dropdown-menu dropdown-menu row p-1">
                                <li class="col-md-5 px-2">
                                    <h6 class="font-weight-bold font-medium-2 ml-1">Apps</h6>
                                    <ul class="row mt-2">
                                        <li class="col-6 col-xl-4">
                                            <a class="text-center mb-2 mb-xl-3" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=&su=&body=" target="_blank">
                                                <i class="feather icon-mail font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">Email</p>
                                            </a>
                                        </li>

                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mb-xl-3" href="app-chat.html" target="_blank"><i class="feather icon-message-square font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">Chat</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mb-xl-3 mt-75 mt-xl-0" href="app-todo.html" target="_blank"><i class="feather icon-check-square font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">Todo</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0" href="app-kanban.html" target="_blank"><i class="feather icon-file-plus font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Kanban</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0" href="app-contacts.html" target="_blank"><i class="feather icon-users font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Contacts</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0" href="invoice-template.html" target="_blank"><i class="feather icon-printer font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Invoice</p>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="col-md-3">
                                    <h6 class="font-weight-bold font-medium-2">Components</h6>
                                    <ul class="row mt-1 mt-xl-2">
                                        <li class="col-12 col-xl-6 pl-0">
                                            <ul class="mega-component-list">
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-alerts.html" target="_blank">Alert</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-callout.html" target="_blank">Callout</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-buttons-basic.html" target="_blank">Buttons</a>
                                                </li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-carousel.html" target="_blank">Carousel</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-12 col-xl-6 pl-0">
                                            <ul class="mega-component-list">
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-dropdowns.html" target="_blank">Drop Down</a>
                                                </li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-list-group.html" target="_blank">List
                                                        Group</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-modals.html" target="_blank">Modals</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2" href="component-pagination.html" target="_blank">Pagination</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Stack..." tabindex="0" data-search="template-search">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                    </ul>
                    
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item">
                            <a class="nav-link p-0" href="{{ url('quick-digital/index') }}">
                                <button class="btn btn-primary" style="height: 30px; padding: 2px 10px; font-size: 14px; line-height: 1.5;">Visit Website</button>
                            </a>
                        </li>
                    </ul>


                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    @if (!empty(Auth::guard('user')->user()->image))
                                    <img src="{{ asset('admin/images/user_images/' . Auth::guard('user')->user()->image) }}" alt="avatar"><i></i>
                                    @else
                                    <img src="{{ asset('admin/images/admin_images/no_image.jpg') }}" alt="avatar"><i></i>
                                    @endif
                                </div><span class="user-name">{{ Auth::guard('user')->user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('admin/update_admin_details') }}"><i class="feather icon-user"></i>
                                    Edit Profile</a>
                                <a class="dropdown-item" href="{{ url('admin/update_password') }}"><i class="feather icon-edit"></i> Update Password</a>
                                {{-- <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My
                                    Inbox</a> --}}
                                {{-- <a class="dropdown-item" href="user-cards.html"><i
                                        class="feather icon-check-square"></i> Task</a>
                                <a class="dropdown-item" href="app-chat.html"><i
                                        class="feather icon-message-square"></i> Chats</a> --}}
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ url('/user/logout') }}"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>