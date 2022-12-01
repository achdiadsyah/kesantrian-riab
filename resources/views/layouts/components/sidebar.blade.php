<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{route('home')}}">
            <img alt="Logo" src="{{asset('assets/media/logos/riab-white.svg')}}" class="h-40px app-sidebar-logo-default" />
            <img alt="Logo" src="{{asset('assets/media/logos/riab-logo.svg')}}" class="h-40px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>

    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                
                <div class="menu-item">
                    <a class="menu-link" href="{{route('home')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-home"></i>
                            </span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                @if(auth()->user()->user_level == "super")
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Admin Menu</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-cog"></i>
                            </span>
                        </span>
                        <span class="menu-title">App Settings</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{route('admin.user-list')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-list"></i>
                            </span>
                        </span>
                        <span class="menu-title">User List</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{route('admin.role-list')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-list"></i>
                            </span>
                        </span>
                        <span class="menu-title">Role Management</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="{{route('admin.menu-list')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-list"></i>
                            </span>
                        </span>
                        <span class="menu-title">Menu Management</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-book"></i>
                            </span>
                        </span>
                        <span class="menu-title">App Log</span>
                    </a>
                </div>
                @endif

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Menu List</span>
                    </div>
                </div>
                
                @if (!empty(Menu::getMenu()))
                    @foreach(Menu::getMenu() as $key)
                        @if(count($key->child))
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <i class="{{$key->favicon}}"></i>
                                    </span>
                                </span>
                                <span class="menu-title">{{$key->name}}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;">
                                @foreach($key->child as $sub)
                                    <div class="menu-item">
                                        <a class="menu-link" href="@if($sub->route !== "#") {{route($sub->route)}} @else {{$sub->route}} @endif">
                                            <span class="menu-bullet">
                                                <span class="{{$sub->favicon}}"></span>
                                            </span>
                                            <span class="menu-title">{{$sub->name}}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="menu-item">
                            <a class="menu-link" href="@if($key->route !== "#") {{route($key->route)}} @else {{$key->route}} @endif">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <i class="{{$key->favicon}}"></i>
                                    </span>
                                </span>
                                <span class="menu-title">{{$key->name}}</span>
                            </a>
                        </div>
                        @endif
                    @endforeach
                @else
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">No Menu</span>
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
