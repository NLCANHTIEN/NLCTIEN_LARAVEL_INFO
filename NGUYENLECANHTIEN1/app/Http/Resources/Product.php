<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)

    {
        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'slug' => $this->slug,
            'cat_id' => $this->cat_id,
            'brand_id' => $this->brand_id,
            'summary' => $this->summary,
            'detail' => $this->detail,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'image' => $this->image,
            'type' => $this->type,
            'status' => $this->status
        ];
    }
}
