<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class JobPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'desc' => $this->desc,
            'region_name' => $this->region ? $this->region->name : '',
            'job_type' => $this->type ? $this->type->name : '',
            'status_name' => $this->status->title,
            'owner_id' => $this->user->id,
            'owner' => $this->user->name,
            'publish' => $this->updated_at->diffForHumans(),
            'salary' => $this->salary,
            'categroy_name' => $this->category->name,
            // 'thumbnail' => $this->image,
            'thumbnail' => $this->image ? Storage::url('public/' . $this->image) : '/images/job.jpg',
            'profile' => $this->user->profile
        ];
    }
}
