<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'id'=>$this['userInfo']->id,
            'email'=>$this['userInfo']->email,
            'name'=>$this['userInfo']->name,
            'role'=>$this['userInfo']->role,
            $this['tokenName']=>$this['token'],
            ];
    }
}
