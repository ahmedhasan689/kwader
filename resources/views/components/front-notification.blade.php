<div class="dropdown notifications">

    <i type="button" id="dropdownMenuButton1" class="far fa-bell" data-bs-toggle="dropdown" aria-expanded="false"></i>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li class="d-flex " style="justify-content:space-between; padding: 0 10px;">
            <span style="color:#000;">
                 {{ $unread }} الاشعارات
            </span>
            <span style="color:#000;">
                الاعدادات
            </span>
        </li>
        <hr>
        @foreach( $notifications as $notification )
            <li>
                <a class="dropdown-item " href="{{ $notification->data['url'] }}">
                    <div class="top">
                        <img src="{{ $notification->data['icon'] }}" width="30" height="30"> </img>
                        <span>
                            {{ $notification->data['title'] }}
                        </span>
                        <p>
                           {{ $notification->data['body'] }}
                        </p>
                    </div>
                    <div class="down">
                        <i class="fa-solid fa-clock"></i>
                        <span>
                            {{ $notification->created_at->diffForHumans() }}
                        </span>
                    </div>
                </a>
            </li>
            <hr>
        @endforeach

    </ul>
</div>
