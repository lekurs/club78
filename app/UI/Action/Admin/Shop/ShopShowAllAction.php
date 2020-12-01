<?php


namespace App\UI\Action\Admin\Shop;


use App\Domain\Repository\ShopRepository;

class ShopShowAllAction
{
    private ShopRepository $shopRepository;

    /**
     * ShopShowAllAction constructor.
     * @param ShopRepository $shopRepository
     */
    public function __construct(ShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    public function __invoke()
    {
        $shops = $this->shopRepository->getAllBy12();

        return view('admin.shop.show_all_shops',[
            'shops' => $shops,
        ]);
    }
}
