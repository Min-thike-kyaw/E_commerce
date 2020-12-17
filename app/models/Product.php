<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;


class Product extends Model
{
    public function genPaginate($get_limit)
    {
        $table_name = $this->getTable();
        $products = [];
        $cats = Capsule::select("SELECT * FROM $table_name ORDER BY id DESC ". $get_limit);
        foreach($cats as $cat) {
            $date = new Carbon($cat->created_at);
            array_push($products, [
                'id' => $cat->id,
                'name' => $cat->name,
                'price' => $cat->price,
                'cat_id' => $cat->cat_id,
                'sub_cat_id' => $cat->sub_cat_id,
                'image' => $cat->image,
                'featured' => $cat->featured,
                'created_at' => $date->toFormattedDateString(),
            ]);
        }
        return $products;
    }
}