<div class="navbar-header" style="background: #1c2134;">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="{{url('admin')}}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
                </span>
            </a>

            <a href="{{url('admin')}}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/logo-light.png')}}" alt="" style="width: 60%;height:70px" height="17">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- Tools -->
        <div class="d-none d-sm-block ms-1">
            <div class="dropdown">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-plus-box-multiple"></i>
                    <span class="d-none d-xl-inline-block ms-1">Tools</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Photoshop</a>
                    <a href="javascript:void(0);" class="dropdown-item">Visual Studio</a>
                    <a href="javascript:void(0);" class="dropdown-item">Sublime Text 3</a>
                    <a href="javascript:void(0);" class="dropdown-item">Phpstorm</a>
                </div>
            </div>
        </div>

        <div class="d-none d-lg-inline-block">
            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-target="#search-wrap">
                <i class="mdi mdi-airplane me-2 font-size-16"></i>Landing
            </button>
        </div>

    </div>

    <!-- Search input -->
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">
            <input class="search-input form-control" placeholder="Search">
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                <i class="mdi mdi-close-circle"></i>
            </a>
        </div>
    </div>

    <div class="d-flex">

        <div class="dropdown d-none d-lg-inline-block">
            <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
                <i class="mdi mdi-magnify"></i>
            </button>
        </div>

        <div class="dropdown d-inline-block d-lg-none ms-2">
            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-magnify"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                <form class="p-3">
                    <div class="m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="dropdown d-none d-md-block">
            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="me-2" src='{{asset("uploads/$flags->image")}}' alt="Header Language" height="16"> {{$flags->languageTitle}} <span class="mdi mdi-chevron-down"> </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                @foreach($langs as $lang)
                <!-- item-->
                <a href='{{route("languages.submitLang",$lang->id)}}' class="dropdown-item notify-item">
                    <img src='{{asset("uploads/$lang->image")}}' alt="user-image" class="me-1" height="12"> <span class="align-middle"> {{$lang->languageTitle}} </span>
                </a>
                @endforeach
                <!--  -->
                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('assets/images/flags/italy.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('assets/images/flags/french.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('assets/images/flags/spain.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('assets/images/flags/russia.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                </a> -->
            </div>
        </div>

        <!-- Notification -->
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon waves-effect notification-step" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-bell-outline"></i>
                <span class="badge bg-danger rounded-pill">2</span>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                <div class="p-3">
                    <h6 class="m-0">Notifications (258) </h6>
                </div>

                <div data-simplebar="init" style="max-height: 230px;">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="mdi mdi-cart-outline"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-1 font-size-15">Your order is placed</h6>
                                                    <div class="text-muted">
                                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                                            industry.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                        <i class="mdi mdi-message"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-1 font-size-15">New Message received</h6>
                                                    <div class="text-muted">
                                                        <p class="mb-1 font-size-12">You have 87 unread messages</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-info rounded-circle font-size-16">
                                                        <i class="mdi mdi-help"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-1 font-size-15">Your order is placed</h6>
                                                    <div class="text-muted">
                                                        <p class="mb-1 font-size-12">It is a long established fact that a reader will
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="mdi mdi-cart-outline"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-1 font-size-15">Your order is placed</h6>
                                                    <div class="text-muted">
                                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                                            industry.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-danger rounded-circle font-size-16">
                                                        <i class="mdi mdi-cart-outline"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-1 font-size-15">Your order is placed</h6>
                                                    <div class="text-muted">
                                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                                            industry.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none; height: 130px;"></div>
                    </div>
                </div>
                <div class="p-2 border-top d-grid">
                    <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                        <i class="mdi mdi-arrow-right-circle me-1"></i> View all
                    </a>
                </div>
            </div>
        </div>

        <!-- full-screen -->
        <div class="dropdown d-none d-lg-inline-block ms-1">
            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                <i class="mdi mdi-fullscreen"></i>
            </button>
        </div>

        <!-- User -->
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect user-step" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src='{{asset("uploads/$authUser->photo")}}' alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1">{{$authUser->fullName}}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="{{url('admin/settings')}}"><i class="dripicons-user d-inline-block text-muted me-2"></i>
                    {{$newLang->AccountSettings}}</a>
                <a class="dropdown-item" href="#"><i class="dripicons-wallet d-inline-block text-muted me-2"></i> My
                    Wallet</a>
                <a class="dropdown-item d-block" href="#"><i class="dripicons-gear d-inline-block text-muted me-2"></i> Settings</a>
                <a class="dropdown-item" href="#"><i class="dripicons-lock d-inline-block text-muted me-2"></i> Lock
                    screen</a>
                <form id="logout-form" method="post" action="{{ url('logout') }}" style="display: none">

                    @csrf
                    <!-- <button type="submit"> submit</button> -->
                </form>
                <div class="dropdown-divider"></div>
                <a id="logout-link" class="dropdown-item" href=""><i class="dripicons-exit d-inline-block text-muted me-2"></i>
                    {{$newLang->logout}}</a>
            </div>
        </div>

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                <i class="mdi mdi-spin mdi-cog"></i>
            </button>
        </div>

    </div>
</div>