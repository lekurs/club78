<?php


namespace App\UI\Action\Admin\Product;


use App\Domain\Entity\Shop;
use App\Domain\Repository\ProductRepository;
use App\Domain\Repository\ShopRepository;
use App\Http\Requests\StoreProduct;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Support\Str;

class ProductCreationAction
{
    private ProductRepository $productRepository;

    private UploadedFilesService $uploadedFileServices;

    /**
     * ProductCreationAction constructor.
     * @param ProductRepository $productRepository
     * @param UploadedFilesService $uploadedFileServices
     */
    public function __construct(ProductRepository $productRepository, UploadedFilesService $uploadedFileServices)
    {
        $this->productRepository = $productRepository;
        $this->uploadedFileServices = $uploadedFileServices;
    }


    public function __invoke(StoreProduct $data)
    {
        $store = $this->productRepository->store($data->all());
        $shop = Shop::whereId($data['shop-id'])->first();

        if ($store == true) {
            if (!is_null(request()->file('product-img-h'))) {
                $imgH = request()->file('product-img-h');
                $this->uploadedFileServices->moveFile($imgH, '/public/images/uploads/' . $shop->slug . '/products');
            }

            if (!is_null(request()->file('product-img-v'))) {
                $imgV = request()->file('product-img-v');
                $this->uploadedFileServices->moveFile($imgV, '/public/images/uploads/' . $shop->slug . '/products');
            }
        }

        return back()->with('success', 'Produit ajouté');
    }
}
