{{--<div class="dropdown notifications">--}}

{{--    <i type="button" id="dropdownMenuButton1" class="far fa-bell" data-bs-toggle="dropdown" aria-expanded="false" style="color:#fff; font-size: large;"></i>--}}

{{--    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
{{--        <li class="d-flex " style="justify-content:space-between; padding: 0 10px;">--}}
{{--            <span style="color:#000;">--}}
{{--                 {{ $unread }} الاشعارات--}}
{{--            </span>--}}
{{--            <span style="color:#000;">--}}
{{--                الاعدادات--}}
{{--            </span>--}}
{{--        </li>--}}
{{--        <hr>--}}
{{--        @foreach( $notifications as $notification )--}}
{{--            <li>--}}
{{--                <a class="dropdown-item " href="{{ $notification->data['url'] }}">--}}
{{--                    <div class="top">--}}
{{--                        <img src="{{ $notification->data['icon'] }}" width="30" height="30"> </img>--}}
{{--                        <span>--}}
{{--                            {{ $notification->data['title'] }}--}}
{{--                        </span>--}}
{{--                        <p>--}}
{{--                           {{ $notification->data['body'] }}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="down">--}}
{{--                        <i class="fa-solid fa-clock"></i>--}}
{{--                        <span>--}}
{{--                            {{ $notification->created_at->diffForHumans() }}--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <hr>--}}
{{--        @endforeach--}}

{{--    </ul>--}}
{{--</div>--}}
<div class="btn-group notification">
    <a class="link-light" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" id="dropdownMenuClickableOutside" data-bs-auto-close="inside">
        <i type="button" class="far fa-bell" style="color:#fff"></i>
        <span class="badge rounded-pill bg-danger position-absolute top-0 start-0 translate-middle">5</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuClickableOutside">
        <div class="notify-header">
            <p>الاشعارات</p>
            <a href="#">الاعدادات</a>
        </div>


        <div class="list-group">
            @foreach($notifications as $notification)
                <a href="{{ $notification->data['url'] }}" class="list-group-item list-group-item-action">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ $notification->data['icon'] }}" class="rounded-circle" width="50" height="50" alt="">
                        <div>
                            <h6 class="mb-0 notify-text">{{ $notification->data['title'] }}</h6>
                            <span>
                                {{ $notification->data['body'] }}
                            </span>
                            <div class="notify-histort text-muted">
                                <i class="bi bi-clock-history"></i>
                                <small>منذ ساعة</small>
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
