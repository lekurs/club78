<?php


namespace App\UI\Action\Admin;


class HomeAdminAction
{
    public function __invoke()
    {
        return view('admin.home_admin');
    }
}
