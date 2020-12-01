<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Shop;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ShopRepository
{

    public function getAll(): Collection
    {
        return Shop::all();
    }

    public function getOneById(int $id): ?Shop
    {
        return Shop::whereId($id)->first();
    }

    public function getOneBySlug(string $slug): ?Shop
    {
        return Shop::whereSlug($slug)->first();
    }

    public function getAllBy12()
    {
        return Shop::paginate(12);
    }

    public function store(array $data)
    {
        $checkStoreName = $this->getOneBySlug(Str::slug($data['shop-name']));

        $shop = new Shop();
        $shop->name = $data['shop-name'];
        $shop->phone = $data['shop-phone'];
        $shop->address = $data['shop-address'];
        $shop->zip = $data['shop-zip'];
        $shop->city = $data['shop-city'];
        $shop->img_manager = $data['shop-img-manager']->getClientOriginalName();
        $shop->image = $data['shop-image']->getClientOriginalName();
        $shop->instagram = $data['shop-instagram'];
        $shop->facebook = $data['shop-facebook'];
        $shop->website = $data['shop-website'];
        $shop->description = $data['shop-description'];
        $shop->infrontof = $data['shop-infrontof'];

        if (is_null($checkStoreName)) {
            $shop->slug = Str::slug($data['shop-name']);
        } else {
            $shop->slug = $checkStoreName->slug . '-1';
        }

        $shop->save();

        return true;
    }
}
