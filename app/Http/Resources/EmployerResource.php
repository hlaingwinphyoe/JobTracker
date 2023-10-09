<?php

namespace App\Http\Resources;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $jobCount = JobPost::where('user_id',$this->id)->statusAvailable()->count();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'profile' => $this->profile,
            'company' => $this->company_name,
            'industry' => $this->company_type,
            'desc' => $this->desc,
            'region_name' => $this->region ? $this->region->name : '',
            'job_type' => $this->type ? $this->type->name : '',
            'time' => $this->created_at->diffForHumans(),
            'job_count' => $jobCount,
        ];
    }
}
