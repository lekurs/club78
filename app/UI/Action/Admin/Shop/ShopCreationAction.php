<?php


namespace App\UI\Action\Admin\Shop;


use App\Domain\Repository\ShopRepository;
use App\Http\Requests\StoreShop;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Support\Str;

class ShopCreationAction
{

    private ShopRepository $shopRepository;

    private UploadedFilesService $uploadedFilesService;

    /**
     * ShopCreationAction constructor.
     * @param ShopRepository $shopRepository
     * @param UploadedFilesService $uploadedFilesService
     */
    public function __construct(ShopRepository $shopRepository, UploadedFilesService $uploadedFilesService)
    {
        $this->shopRepository = $shopRepository;
        $this->uploadedFilesService = $uploadedFilesService;
    }

    public function __invoke(StoreShop $data)
    {
        $store = $this->shopRepository->store($data->all());

        if ($store == true) {
            if (!is_null(request()->file('shop-img-manager'))) {
                $imgManager = request()->file('shop-img-manager');
                $this->uploadedFilesService->moveFile($imgManager, '/public/images/uploads/' . Str::slug($data['shop-name']) . '/manager');
            }

            if (!is_null(request()->file('shop-image'))) {
                $imgShop = request()->file('shop-image');
                $this->uploadedFilesService->moveFile($imgShop, '/public/images/uploads/' . Str::slug($data['shop-name']) . '/products');
            }
        }

        return back()->with('success', 'Magasin ajouté');
    }

}
