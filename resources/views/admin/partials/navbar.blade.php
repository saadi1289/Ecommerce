<header class="navbar">
    <div class="navbar-left">
        <button class="sidebar-toggle-btn" id="sidebarToggleBtn">
            <i class="fas fa-bars"></i>
        </button>

        <div class="breadcrumb">
            <span class="breadcrumb-item">Admin</span>
            @if (isset($breadcrumbs))
                @foreach ($breadcrumbs as $breadcrumb)
                    <i class="fas fa-chevron-right breadcrumb-separator"></i>
                    <span class="breadcrumb-item">{{ $breadcrumb }}</span>
                @endforeach
            @endif
        </div>
    </div>

    <div class="navbar-right">
        <!-- Search -->
        <div class="search-box">
            <input type="text" placeholder="Search..." class="search-input">
            <i class="fas fa-search search-icon"></i>
        </div>

        <!-- Notifications -->
        <div class="navbar-item dropdown">
            <button class="navbar-btn notification-btn" id="notificationBtn">
                <i class="fas fa-bell"></i>
                <span class="notification-badge">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
            </button>
            <div class="dropdown-menu notification-dropdown" id="notificationDropdown">
                <div class="dropdown-header">
                    <h6>Notifications</h6>
                    <span class="badge">
                        {{ auth()->user()->unreadNotifications->count() }} New
                    </span>
                </div>
                <div class="notification-list">
                    @forelse (auth()->user()->notifications()->latest()->take(5)->get() as $notification)
                        <a href="{{ $notification->data['url'] }}"
                           class="notification-item {{ $notification->read_at ? 'read' : 'unread' }}"
                           data-notification-id="{{ $notification->id }}"
                           onclick="markAsRead(event, this)">
                            <div class="notification-icon
                                {{ $notification->data['icon'] == 'fa-shopping-cart' ? 'bg-success' :
                                   ($notification->data['icon'] == 'fa-exclamation-triangle' ? 'bg-warning' : 'bg-primary') }}">
                                <i class="fas {{ $notification->data['icon'] }}"></i>
                            </div>
                            <div class="notification-content">
                                <p>{{ $notification->data['message'] }}</p>
                                <small>{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    @empty
                        <div class="notification-item">
                            <div class="notification-content">
                                <p>No notifications available.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="dropdown-footer">
                    <a href="{{ route('admin.notifications.index') }}" class="view-all-btn">View All Notifications</a>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="navbar-item dropdown">
            <button class="navbar-btn profile-btn" id="profileBtn">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name ?? 'Admin' }}&background=6366f1&color=fff"
                     alt="Profile" class="profile-avatar">
                <span class="profile-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-menu profile-dropdown" id="profileDropdown">
                <div class="dropdown-header">
                    <div class="user-info">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name ?? 'Admin' }}&background=6366f1&color=fff"
                             alt="Profile" class="user-avatar">
                        <div class="user-details">
                            <h6>{{ auth()->user()->first_name ?? 'Admin User' }}</h6>
                            <p>{{ auth()->user()->email ?? 'admin@example.com' }}</p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-body">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user"></i> My Profile
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-question-circle"></i> Help & Support
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Mark all as read when bell is clicked
    $('#notificationBtn').on('click', function () {
        $.ajax({
            url: '{{ route('admin.notifications.read.all') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    $('.notification-item').removeClass('unread').addClass('read');
                    $('.notification-badge').text('0');
                }
            }
        });
    });

    // Mark individual as read on click
    function markAsRead(event, el) {
        event.preventDefault();
        var id = $(el).data('notification-id');
        var url = $(el).attr('href');

        $.ajax({
            url: '/admin/notifications/read/' + id,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                $(el).removeClass('unread').addClass('read');
                window.location.href = url;
            }
        });
    }
</script>
