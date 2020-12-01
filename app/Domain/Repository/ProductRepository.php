<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Product;
use App\Domain\Entity\ProductImage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ProductRepository
{

    public function getAll(): Collection
    {
        return Product::all();
    }

    public function getOneById(int $id): Product
    {
        return Product::whereId($id)->first();
    }

    public function getOneBySlug(string $slug): Product
    {
        return Product::whereSlug($slug)->first();
    }

    public function store(array $data)
    {
//        dd($data);
        $product = new Product();

        $product->label = $data['product-label'];
        $product->description = $data['product-description'];
        $product->slug = Str::slug($data['product-label']);
        $product->shop_id = $data['shop-id'];
        $product->save();
        $lastId = $product->id;

        $productImages = new ProductImage();
        if (isset($data['product-img-h'])) {
            $productImages->img_path_h = $data['product-img-h']->getClientOriginalName();
        }
        if (isset($data['product-img-v'])) {
            $productImages->img_path_v = $data['product-img-v']->getClientOriginalName();
        }
        $productImages->product_id = $lastId;
        $productImages->main = $data['product-img-main'];
        $productImages->save();

        return true;
    }

}
