<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Episode extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'download_url' => $this->download_url,
            'description' => $this->description,
            'episode_number' => $this->episode_number
            //'body' => $this->body
        ];
    }

    public function with($request){
        return [
            'version' => '1.0.0',
            'auther' => 'Ahmad Bosswait'
        ];
    }
}
