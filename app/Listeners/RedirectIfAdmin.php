<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Redirect;

class RedirectIfAdmin
{
    /**
     * Handle the event.
     */
    public function handle(Authenticated $event)
    {
        // Check if the authenticated user is an admin
        if ($event->user->is_admin) {
            Redirect::setIntendedUrl(route('admin.dashboard')); // Set the intended URL to the admin dashboard
        }
    }
}
