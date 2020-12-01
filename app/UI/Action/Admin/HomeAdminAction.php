<?php


namespace App\UI\Action\Admin;


use App\Services\RandColor\RandColorService;

class HomeAdminAction
{
    private $randColorService;

    /**
     * HomeAdminAction constructor.
     * @param $randColorService
     */
    public function __construct(RandColorService $randColorService)
    {
        $this->randColorService = $randColorService;
    }


    public function __invoke()
    {
        $color = $this->randColorService->randomColor();
        return view('admin.home_admin', [
            'color' => $color
        ]);
    }
}
