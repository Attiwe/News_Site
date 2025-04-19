

<aside class="col-md-3 nav-sticky dashboard-sidebar">
            <!-- User Info Section -->
            <div class="user-info text-center p-3">
                <img src="{{Auth::user()->image}}" alt="User Image" class="rounded-circle mb-2"
                    style="width: 80px; height: 80px; object-fit: cover" />
                <h5 class="mb-0 text-info"> {{Auth::user()->username }}</h5>
            </div>

            <!-- Sidebar Menu -->
            <div class="list-group profile-sidebar-menu">
                <a href="{{route('frontend.dashboard')}}" class="list-group-item list-group-item-action  {{$profile_active ?? '' }}   menu-item"
                    data-section="profile">
                    <i class="fas fa-user"></i> Profile
                </a>
                <a href="{{route('frontend.notifications-profile')}}"
                    class="list-group-item list-group-item-action menu-item  {{$notification_active ?? '' }}   " data-section="notifications">
                    <i class="fas fa-bell"></i> Notifications
                </a>
                <a href="{{route('frontend.setting')}}" class="list-group-item list-group-item-action menu-item"
                    data-section="settings">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <a href= "javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="list-group-item list-group-item-action menu-item"
                    data-section="settings">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </aside>