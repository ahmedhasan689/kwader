
<div class="btn-group notification">
    <a class="link-light" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" id="dropdownMenuClickableOutside" data-bs-auto-close="inside">
        <i type="button" class="far fa-bell" style="color:#fff"></i>
        @if( $unread )
            <span class="badge rounded-pill bg-danger position-absolute top-0 start-0 translate-middle" id="unread">
                {{ $unread }}
            </span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuClickableOutside">
        <div class="notify-header">
            <p>الاشعارات</p>
            <a href="#">الاعدادات</a>
        </div>

        <audio src="{{ asset('Front_Assets/voice-alert.mp3') }}" class="voice-alert" controls style="display: none"></audio>

        <div class="list-group" id="notification-list">
            @foreach($notifications as $notification)
                <a href="{{ route('notification.show', ['id' => $notification->id]) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ $notification->data['icon'] }}" class="rounded-circle" width="50" height="50" alt="">
                        <div>
                            <h6 class="mb-0 notify-text">{{ $notification->data['title'] }}</h6>
                            <span>
                                {{ $notification->data['body'] }}
                            </span>
                            <div class="notify-histort text-muted">
                                <i class="bi bi-clock-history"></i>
                                <small>
                                    {{ $notification->data['time'] }}
                                </small>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>


        <div class="text-center py-3 foot-notification">
            <a href="#">عرض الكل</a>
        </div>
    </ul>
</div>
