<?php


namespace App\UI\Action\Admin\Shop;


use App\Domain\Repository\ShopRepository;

class ShopShowOneAction
{

    private ShopRepository $shopRepository;

    /**
     * ShopShowOneAction constructor.
     * @param ShopRepository $shopRepository
     */
    public function __construct(ShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }


    public function __invoke()
    {
        $shop = $this->shopRepository->getOneBySlug(request('shopSlug'));

        return view('admin.shop.show_shop', [
            'shop' => $shop
        ]);
    }
}
