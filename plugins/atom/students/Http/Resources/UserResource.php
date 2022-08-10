<?php
namespace Atom\Students\Http\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
 
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->user_id,
            'user_id' => $this->id
        ];
    }
}