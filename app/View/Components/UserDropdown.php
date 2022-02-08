<?php

namespace App\View\Components;

use Illuminate\View\Component;
use \App\Models\User;

class UserDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.user-dropdown',[
          'users' => User::all(),
          'currentUser' => User::where('username',request('user'))->first()

        ]);
    }
}
