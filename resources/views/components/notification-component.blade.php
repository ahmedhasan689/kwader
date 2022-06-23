{{-- Notofications --}}
<div class="dropdown nav-item main-header-notification">
    <a class="new nav-link" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
        @if( $unread > 0)
            <span class=" pulse"></span>
        @endif
    </a>
    <div class="dropdown-menu">
        <div class="menu-header-content bg-primary text-right">
            <div class="d-flex">
                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications</h6>
                <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</span>
            </div>
            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have {{ $unread }} unread Notifications</p>
        </div>

        <div class="main-notification-list Notification-scroll">
            @foreach( $notifications as $notification )
                <a class="d-flex p-3 border-bottom" href="{{ $notification->data['url'] }}">
                    <div class="notifyimg">
                        <img src="{{ $notification->data['icon'] }}" width="40" height="40">
                    </div>
                    <div class="mr-3">
                        <h5 class="notification-label mb-1">{{ $notification->data['title'] }}</h5>
                        <div class="notification-subtext">
                            {{ $notification->data['body'] }}
                        </div>
                        <div class="notification-subtext">
                            {{ $notification->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="mr-auto" >
                        <i class="las la-angle-left text-left text-muted"></i>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="dropdown-footer">
            <a href="">VIEW ALL</a>
        </div>
    </div>
</div>
