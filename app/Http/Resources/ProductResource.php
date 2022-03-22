<?php

namespace App\Http\Resources;

use App\Models\TailorRating;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'image' => asset($this->image),
            'sp' => $this->sp,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'category' => $this->category->name,
            'address' => $this->category->address,
            'contact' => $this->category->contact,
            'logo' => asset($this->category->feature),
            'rating' =>  TailorRating::where('category_id',$this->category_id)->selectRaw('avg(rating) as rating')->first(),
            'user_id' => $this->user_id,
        ];
    }
}
