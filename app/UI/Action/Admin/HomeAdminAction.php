<?php


namespace App\UI\Action\Admin;


use App\Services\RandColor\RandColorService;

class HomeAdminAction
{
    public function __invoke()
    {
        return view('admin.home_admin', [
        ]);
    }
}
