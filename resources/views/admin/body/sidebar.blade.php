<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Apps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="apps-calendar.html">
                                <span data-key="t-calendar">Calendar</span>
                            </a>
                        </li>

                        <li>
                            <a href="apps-chat.html">
                                <span data-key="t-chat">Chat</span>
                            </a>
                        </li>



                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span data-key="t-email">Email</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="apps-email-inbox.html" data-key="t-inbox">Inbox</a></li>
                                <li><a href="apps-email-read.html" data-key="t-read-email">Read Email</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span data-key="t-invoices">Invoices</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="apps-invoices-list.html" data-key="t-invoice-list">Invoice List</a></li>
                                <li><a href="apps-invoices-detail.html" data-key="t-invoice-detail">Invoice Detail</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Manage Rastaurant</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.all.restaurant') }}">
                                <span data-key="t-login">
                                    All Rastaurant Product
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.add.restaurant') }}">
                                <span data-key="t-login">
                                    Add Rastaurant
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Manage Banner</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.all.banner') }}">
                                <span data-key="t-login">
                                    All Banner
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.add.restaurant') }}">
                                <span data-key="t-login">
                                    Add Rastaurant
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.category') }}">
                                <span data-key="t-login">
                                    All Category
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="auth-login.html">
                                <span data-key="t-login">
                                    Add Category
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">City</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.city') }}">
                                <span data-key="t-login">
                                    All City
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="auth-login.html">
                                <span data-key="t-login">
                                    Add City
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Manage Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.all.order') }}">
                                <span data-key="t-login">
                                    All Order
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span data-key="t-login">
                                    Confirm Order
                                </span>
                            </a>
                        </li>
                        {{-- Order list  --}}
                        <li>
                            <a href="#">
                                <span data-key="t-login">
                                    Processing Order
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span data-key="t-login">
                                    Delivered Order
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Manage Rastaurant</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.all.product') }}">
                                <span data-key="t-login">
                                    All Rastaurant Product
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.add.product') }}">
                                <span data-key="t-login">
                                    Add Product
                                </span>
                            </a>
                        </li>
                        {{-- Order list  --}}
                        <li>
                            <a href="{{ route('admin.add.product') }}">
                                <span data-key="t-login">
                                    Order List
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Reviews Manage </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.pending.review') }}" data-key="t-login">Pending Reviews</a></li>
                        <li><a href="{{ route('admin.approved.review') }}" data-key="t-register">Approved Reviews</a></li>

                    </ul>
                </li>
                {{-- Role Permition  --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Role </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.permition') }}" data-key="t-login">Add Role</a></li>
                        <li><a href="{{ route('admin.approved.review') }}" data-key="t-register">Show All Role</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Admin All Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.all.report') }}" data-key="t-login">All Report</a></li>
                        <li><a href="#" data-key="t-register">Product List</a></li>
                        <li><a href="#" data-key="t-register">Order List</a></li>
                        <li><a href="#" data-key="t-register">Customer List</a></li>
                        <li><a href="#" data-key="t-register">Cupun List</a></li>
                        <li><a href="#" data-key="t-register">Discount List</a></li>
                        <li><a href="#" data-key="t-register">Category List</a></li>
                        <li><a href="#" data-key="t-register">City List</a></li>





                    </ul>
                </li>



                <li class="mt-2 menu-title" data-key="t-components">Elements</li>


                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="box"></i>
                        <span class="badge rounded-pill badge-soft-danger text-danger float-end">7</span>
                        <span data-key="t-forms">Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html" data-key="t-form-elements">Basic Elements</a></li>
                        <li><a href="form-validation.html" data-key="t-form-validation">Validation</a></li>

                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="map"></i>
                        <span data-key="t-maps">Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html" data-key="t-g-maps">Google</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="share-2"></i>
                        <span data-key="t-multi-level">Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" data-key="t-level-1-1">Level 1.1</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-2-1">Level 2.1</a></li>
                                <li><a href="javascript: void(0);" data-key="t-level-2-2">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>

            <div class="mx-4 mt-5 mb-0 text-center border-0 card sidebar-alert">
                <div class="card-body">
                    <img src="{{ asset('backend/assets/images/giftbox.png') }}" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                        <a href="#!" class="mt-2 btn btn-primary">Upgrade Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
