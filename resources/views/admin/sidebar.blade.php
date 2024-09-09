<header class="app-header sticky" id="header">

    <div class="main-header-container container-fluid bg-light-gray">

        <div class="header-content-left">

            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="index.html" class="header-logo">
                        <img src="{{ URL::asset('admin/images/brand-logos/digi-logo.png')}}" alt="logo">

                    </a>
                </div>
            </div>

            <div class="header-element mx-lg-0 mx-2">
                <a aria-label="Hide Sidebar"
                    class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                    data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
            </div>


        </div>

        <ul class="header-content-right">

            <li class="header-element d-md-none d-block">
                <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                    data-bs-target="#header-responsive-search">

                    <i class="bi bi-search header-link-icon"></i>

                </a>
            </li>

            <li class="header-element notifications-dropdown d-xl-block d-none dropdown">

                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon animate-bell" width="32" height="32"
                        fill="#000000" viewBox="0 0 256 256">
                        <path
                            d="M208,192H48a8,8,0,0,1-6.88-12C47.71,168.6,56,139.81,56,104a72,72,0,0,1,144,0c0,35.82,8.3,64.6,14.9,76A8,8,0,0,1,208,192Z"
                            opacity="0.1"></path>
                        <path
                            d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216ZM48,184c7.7-13.24,16-43.92,16-80a64,64,0,1,1,128,0c0,36.05,8.28,66.73,16,80Z">
                        </path>
                    </svg>
                    <span class="header-icon-pulse bg-secondary rounded pulse pulse-secondary"></span>
                </a>

                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-16">Notifications</p>
                            <span class="badge bg-secondary-transparent" id="notifiation-data">5 Unread</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled mb-0" id="header-notification-scroll">
                        <li class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="pe-2 lh-1">
                                    <span class="avatar avatar-md avatar-rounded bg-primary">
                                        <i class="ti ti-message-dots fs-5"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-medium"><a href="javascript:void(0);">Messages</a></p>
                                        <div class="text-muted fw-normal fs-12 header-notification-text text-truncate">
                                            John Doe messaged you.</div>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                class="text-fixed-white ri-close-circle-line fs-5"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="pe-2 lh-1">
                                    <span class="avatar avatar-md bg-secondary avatar-rounded">
                                        <i class="ti ti-shopping-cart fs-5"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-medium"><a href="javascript:void(0);">Orders</a></p>
                                        <div class="text-muted fw-normal fs-12 header-notification-text text-truncate">
                                            Order <span class="text-warning">#12345</span> confirmed.</div>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                class="text-fixed-white ri-close-circle-line fs-5"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="pe-2 lh-1">
                                    <span class="avatar avatar-md bg-success avatar-rounded">
                                        <i class="ti ti-user-circle fs-5"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-medium"><a href="javascript:void(0);">Profile</a></p>
                                        <div class="text-muted fw-normal fs-12 header-notification-text text-truncate">
                                            Complete your profile for offers!</div>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                class="text-fixed-white ri-close-circle-line fs-5"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="pe-2 lh-1">
                                    <span class="avatar avatar-md bg-orange avatar-rounded">
                                        <i class="ti ti-gift fs-5"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-medium"><a href="javascript:void(0);">Offers</a></p>
                                        <div class="text-muted fw-normal fs-12 header-notification-text text-truncate">
                                            20% off electronics!</div>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                class="text-fixed-white ri-close-circle-line fs-5"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="pe-2 lh-1">
                                    <span class="avatar avatar-md bg-info avatar-rounded">
                                        <i class="ti ti-calendar fs-5"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-medium"><a href="javascript:void(0);">Events</a></p>
                                        <div class="text-muted fw-normal fs-12 header-notification-text text-truncate">
                                            Webinar in 1 hour!</div>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                class="text-fixed-white ri-close-circle-line fs-5"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="p-3 empty-header-item1 border-top">
                        <div class="d-grid">
                            <a href="javascript:void(0);" class="btn btn-primary btn-wave">View All</a>
                        </div>
                    </div>
                    <div class="p-5 empty-item1 d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                <i class="text-fixed-white ri-notification-off-line fs-2"></i>
                            </span>
                            <h6 class="fw-medium mt-3">No New Notifications</h6>
                        </div>
                    </div>
                </div>

            </li>

            <li class="header-element dropdown">

                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">

                        <div class="d-xl-block d-none lh-1">
                            <span class="fw-medium lh-1">Admin</span>
                        </div>
                    </div>
                </a>

                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <li><a class="dropdown-item d-flex align-items-center" href="profile.html"><i
                                class="ti ti-user me-2 fs-18 text-primary"></i>Profile</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="mail.html"><i
                                class="ti ti-mail me-2 fs-18 text-secondary"></i>Inbox</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{url('admin/logout')}}"><i
                                class="ti ti-logout me-2 fs-18 text-warning"></i>Log Out</a></li>
                </ul>
            </li>

  


        </ul>


    </div>


</header>

<div class="modal fade" id="header-responsive-search" tabindex="-1" aria-labelledby="header-responsive-search"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" class="form-control border-end-0" placeholder="Search Anything ..."
                        aria-label="Search Anything ..." aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i
                            class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<aside class="app-sidebar sticky" id="sidebar">

    <div class="main-sidebar-header">
        <a href="{{url('admin/dashboard')}}" class="header-logo">
            <img src="{{ URL::asset('admin/images/brand-logos/digi-logo.png')}}" alt="logo">
        </a>
    </div>

    <div class="main-sidebar" id="sidebar-scroll">

        <nav class="main-menu-container bg-themed-color nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">

                <li class="slide">
                    <a href="{{url('admin/dashboard')}}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32"
                            viewBox="0 0 256 256">
                            <path
                                d="M216,115.54V208a8,8,0,0,1-8,8H160a8,8,0,0,1-8-8V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54A8,8,0,0,1,216,115.54Z"
                                opacity="0.2"></path>
                            <path
                                d="M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z">
                            </path>
                        </svg>
                        <span class="side-menu__label text-fixed-white ">Dashboard</span>
                    </a>
                </li>

                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="text-fixed-white side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32"
                            viewBox="0 0 256 256">
                            <path
                                d="M112,56v48a8,8,0,0,1-8,8H56a8,8,0,0,1-8-8V56a8,8,0,0,1,8-8h48A8,8,0,0,1,112,56Zm88-8H152a8,8,0,0,0-8,8v48a8,8,0,0,0,8,8h48a8,8,0,0,0,8-8V56A8,8,0,0,0,200,48Zm-96,96H56a8,8,0,0,0-8,8v48a8,8,0,0,0,8,8h48a8,8,0,0,0,8-8V152A8,8,0,0,0,104,144Zm96,0H152a8,8,0,0,0-8,8v48a8,8,0,0,0,8,8h48a8,8,0,0,0,8-8V152A8,8,0,0,0,200,144Z"
                                opacity="0.2"></path>
                            <path
                                d="M200,136H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48ZM104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Z">
                            </path>
                        </svg>
                        <span class="side-menu__label text-fixed-white ">Business Data</span>
                        <i class="text-fixed-white ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Data</a>
                        </li>
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">Pending</a>
                        </li>
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">Verified</a>
                        </li>
                    </ul>
                </li>

                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="text-fixed-white side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32"
                            viewBox="0 0 256 256">
                            <path d="M224,80l-96,56L32,80l96-56Z" opacity="0.2"></path>
                            <path
                                d="M230.91,172A8,8,0,0,1,228,182.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,169.09l92,53.65,92-53.65A8,8,0,0,1,230.91,172ZM220,121.09l-92,53.65L36,121.09A8,8,0,0,0,28,134.91l96,56a8,8,0,0,0,8.06,0l96-56A8,8,0,1,0,220,121.09ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26Z">
                            </path>
                        </svg>
                        <span class="side-menu__label text-fixed-white ">Customer's User</span>
                        <i class="text-fixed-white ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Customer's User</a>
                        </li>
                        <li class="slide">
                            <a href="{{url('admin/pendingcustomer')}}" class="text-fixed-white side-menu__item">Pending</a>
                        </li>
                        <li class="slide">
                            <a href="{{url('admin/verifiedcustomer')}}" class="text-fixed-white side-menu__item">Verified</a>
                        </li>
                        <li class="slide">
                            <a href="{{url('admin/rejectedcustomer')}}" class="text-fixed-white side-menu__item">Rejected</a>
                        </li>
                    </ul>
                </li>

                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="text-fixed-white side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M19 22H5C3.34315 22 2 20.6569 2 19V3C2 2.44772 2.44772 2 3 2H17C17.5523 2 18 2.44772 18 3V15H22V19C22 20.6569 20.6569 22 19 22ZM18 17V19C18 19.5523 18.4477 20 19 20C19.5523 20 20 19.5523 20 19V17H18ZM16 20V4H4V19C4 19.5523 4.44772 20 5 20H16ZM6 7H14V9H6V7ZM6 11H14V13H6V11ZM6 15H11V17H6V15Z"></path></svg>
                        <span class="side-menu__label text-fixed-white ">Menu</span>
                        <i class="text-fixed-white ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Menu</a>
                        </li>
                        <li class="slide">
                            <a href="{{url('admin/menu')}}" class="text-fixed-white side-menu__item">Menu List</a>
                        </li>
                        <li class="slide">
                            <a href="{{url('admin/verifiedcustomer')}}" class="text-fixed-white side-menu__item">Business Menu Details</a>
                        </li>
                  
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="text-fixed-white side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32"
                            viewBox="0 0 256 256">
                            <path d="M216,96V208a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V96a8,8,0,0,1,8-8H208A8,8,0,0,1,216,96Z"
                                opacity="0.2"></path>
                            <path
                                d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96ZM208,208H48V96H208V208Zm-68-56a12,12,0,1,1-12-12A12,12,0,0,1,140,152Z"
                                fill="white"></path>
                        </svg>
                        <span class="side-menu__label text-fixed-white ">Payment</span>
                        <i class="text-fixed-white ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Payment</a>
                        </li>
         
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">QR</a>
                        </li>
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">Esewa</a>
                        </li>
                    </ul>
                </li>

                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="text-fixed-white side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="32" height="32"
                            viewBox="0 0 256 256">
                            <path
                                d="M230.1,108.76,198.25,90.62c-.64-1.16-1.31-2.29-2-3.41l-.12-36A104.61,104.61,0,0,0,162,32L130,49.89c-1.34,0-2.69,0-4,0L94,32A104.58,104.58,0,0,0,59.89,51.25l-.16,36c-.7,1.12-1.37,2.26-2,3.41l-31.84,18.1a99.15,99.15,0,0,0,0,38.46l31.85,18.14c.64,1.16,1.31,2.29,2,3.41l.12,36A104.61,104.61,0,0,0,94,224l32-17.87c1.34,0,2.69,0,4,0L162,224a104.58,104.58,0,0,0,34.08-19.25l.16-36c.7-1.12,1.37-2.26,2-3.41l31.84-18.1A99.15,99.15,0,0,0,230.1,108.76ZM128,168a40,40,0,1,1,40-40A40,40,0,0,1,128,168Z"
                                opacity="0.1"></path>
                            <path
                                d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm109.94-52.79a8,8,0,0,0-3.89-5.4l-29.83-17-.12-33.62a8,8,0,0,0-2.83-6.08,111.91,111.91,0,0,0-36.72-20.67,8,8,0,0,0-6.46.59L128,41.85,97.88,25a8,8,0,0,0-6.47-.6A111.92,111.92,0,0,0,54.73,45.15a8,8,0,0,0-2.83,6.07l-.15,33.65-29.83,17a8,8,0,0,0-3.89,5.4,106.47,106.47,0,0,0,0,41.56,8,8,0,0,0,3.89,5.4l29.83,17,.12,33.63a8,8,0,0,0,2.83,6.08,111.91,111.91,0,0,0,36.72,20.67,8,8,0,0,0,6.46-.59L128,214.15,158.12,231a7.91,7.91,0,0,0,3.9,1,8.09,8.09,0,0,0,2.57-.42,112.1,112.1,0,0,0,36.68-20.73,8,8,0,0,0,2.83-6.07l.15-33.65,29.83-17a8,8,0,0,0,3.89-5.4A106.47,106.47,0,0,0,237.94,107.21Zm-15,34.91-28.57,16.25a8,8,0,0,0-3,3c-.58,1-1.19,2.06-1.81,3.06a7.94,7.94,0,0,0-1.22,4.21l-.15,32.25a95.89,95.89,0,0,1-25.37,14.3L134,199.13a8,8,0,0,0-3.91-1h-.19c-1.21,0-2.43,0-3.64,0a8.1,8.1,0,0,0-4.1,1l-28.84,16.1A96,96,0,0,1,67.88,201l-.11-32.2a8,8,0,0,0-1.22-4.22c-.62-1-1.23-2-1.8-3.06a8.09,8.09,0,0,0-3-3.06l-28.6-16.29a90.49,90.49,0,0,1,0-28.26L61.67,97.63a8,8,0,0,0,3-3c.58-1,1.19-2.06,1.81-3.06a7.94,7.94,0,0,0,1.22-4.21l.15-32.25a95.89,95.89,0,0,1,25.37-14.3L122,56.87a8,8,0,0,0,4.1,1c1.21,0,2.43,0,3.64,0a8,8,0,0,0,4.1-1l28.84-16.1A96,96,0,0,1,188.12,55l.11,32.2a8,8,0,0,0,1.22,4.22c.62,1,1.23,2,1.8,3.06a8.09,8.09,0,0,0,3,3.06l28.6,16.29A90.49,90.49,0,0,1,222.9,142.12Z">
                            </path>
                        </svg>
                        <span class="side-menu__label text-fixed-white ">Setting</span>
                        <i class="text-fixed-white ri-arrow-down-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Setting</a>
                        </li>
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">Email Template</a>
                        </li>
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">OTP Template</a>
                        </li>
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">Payment Method</a>
                        </li>
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">User</a>
                        </li>
                        <li class="slide">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">Roles</a>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">Business Data
                                <i class="text-fixed-white ri-arrow-down-s-line side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{url('admin/category')}}"
                                        class="text-fixed-white side-menu__item">Category</a>
                                </li>
                                <li class="slide">
                                    <a href="{{url('admin/facility')}}"
                                        class="text-fixed-white side-menu__item">Facility</a>
                                </li>
                                <li class="slide">
                                    <a href="{{url('admin/service')}}"
                                        class="text-fixed-white side-menu__item">Service</a>
                                </li>
                                <li class="slide">
                                    <a href="{{url('admin/authorize')}}"
                                        class="text-fixed-white side-menu__item">Authorizes</a>
                                </li>
                                <li class="slide">
                                    <a href="{{url('admin/province')}}"
                                        class="text-fixed-white side-menu__item">Provinces</a>
                                </li>
                                <li class="slide">
                                    <a href="{{url('admin/district')}}"
                                        class="text-fixed-white side-menu__item">Districts</a>
                                </li>
                                <li class="slide">
                                    <a href="{{url('admin/municipality')}}"
                                        class="text-fixed-white side-menu__item">Municipalities</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="text-fixed-white side-menu__item">Website Details
                                <i class="text-fixed-white ri-arrow-down-s-line side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{url('admin/category')}}"
                                        class="text-fixed-white side-menu__item">Contact</a>
                                </li>
                                <li class="slide">
                                    <a href="{{url('admin/facility')}}"
                                        class="text-fixed-white side-menu__item">Testimonial</a>
                                </li>
                                <li class="slide">
                                    <a href="{{url('admin/service')}}"
                                        class="text-fixed-white side-menu__item">Site Setting</a>
                                </li>
                          
                            </ul>
                        </li>
                    </ul>
                </li>


            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- END SIDEBAR -->

<!-- MAIN-CONTENT -->