<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class FrontNotification extends Component
{
    public $notifications;

    public $unread;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();
        $this->notifications  = $user->notifications;
        $this->unread = $user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front-notification');
    }
}
