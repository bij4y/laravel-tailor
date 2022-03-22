<?php

namespace App\Http\Resources;

use App\Models\TailorRating;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'feature' =>asset($this->feature),
            'address' => $this->address,
            'contact' => $this->contact,
            'rating' =>  TailorRating::where('category_id',$this->id)->selectRaw('avg(rating) as rating')->first(),
            'products' => ProductResource::collection($this->products),
        ];
    }
}
