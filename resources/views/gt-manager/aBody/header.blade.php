@php
use App\Models\Admin;
$id = Auth::guard('admin')->user()->id;
$adminData = Admin::find($id);
@endphp

<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i data-feather="search"></i>
                    </div>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>

        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-apps">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="appsDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">Web Apps</p>
                        <a href="javascript:;" class="text-muted">Edit</a>
                    </div>
                    <div class="dropdown-body">
                        <div class="d-flex align-items-center apps">
                            <a href="pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i>
                                <p>Chat</p>
                            </a>
                            <a href="pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i>
                                <p>Calendar</p>
                            </a>
                            <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i>
                                <p>Email</p>
                            </a>
                            <a href="pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i>
                                <p>Profile</p>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown nav-messages">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="mail"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">9 New Messages</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="dropdown-body">
                        <a href="javascript:;" class="dropdown-item">
                            <div class="figure">
                                <img src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Leonardo Payne</p>
                                    <p class="sub-text text-muted">2 min ago</p>
                                </div>
                                <p class="sub-text text-muted">Project status</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="figure">
                                <img src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Carl Henson</p>
                                    <p class="sub-text text-muted">30 min ago</p>
                                </div>
                                <p class="sub-text text-muted">Client meeting</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="figure">
                                <img src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Jensen Combs</p>
                                    <p class="sub-text text-muted">1 hrs ago</p>
                                </div>
                                <p class="sub-text text-muted">Project updates</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="figure">
                                <img src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Amiah Burton</p>
                                    <p class="sub-text text-muted">2 hrs ago</p>
                                </div>
                                <p class="sub-text text-muted">Project deadline</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="figure">
                                <img src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Yaretzi Mayo</p>
                                    <p class="sub-text text-muted">5 hr ago</p>
                                </div>
                                <p class="sub-text text-muted">New record</p>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>


            {{-- USER Profile --}}

            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="image-in-circle-75"
                    src="{{ !empty($adminData->photo) ? url('media/' . $adminData->photo) :
                    asset('gt_manager/assets/images/no_image.jpg') }}"
                    alt="profile">
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div>
                            <img class="image-in-circle-75"
                            src="{{ !empty($adminData->photo) ? url('media/' . $adminData->photo) :
                            asset('gt_manager/assets/images/no_image.jpg') }}"
                            alt="profile">
                        </div>
                        <div class="info text-center mt-2">
                            <p class="name font-weight-bold mb-0">{{ $adminData->username }}</p>
                            <p class="email text-muted mb-3">{{ $adminData->email }}</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="{{ route('admin-profile') }}" class="nav-link">
                                    <i data-feather="user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin-change-password') }}" class="nav-link">
                                    <i data-feather="edit"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin-logout') }}" class="nav-link">
                                    <i data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
