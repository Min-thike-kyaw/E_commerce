<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Category extends Model
{
    protected $table = "categories";

    public function genPaginate($get_limit)
    {
        $table_name = $this->getTable();
        $categories = [];
        $cats = Capsule::select("SELECT * FROM $table_name ORDER BY id DESC ". $get_limit);
        foreach($cats as $cat) {
            $date = new Carbon($cat->created_at);
            array_push($categories, [
                'id' => $cat->id,
                'name' => $cat->name,
                'slug' => $cat->slug,
                'created_at' => $date->toFormattedDateString(),
            ]);
        }
        return $categories;
    }
}