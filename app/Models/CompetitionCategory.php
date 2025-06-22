<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class CompetitionCategory extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => Status::class,
    ];

    public function competitions()
    {
        return $this->hasMany(Competition::class, 'category_id');
    }

    public function getThumbnailImage()
    {
        $isUrl = str_contains($this->image, 'http');

        return $isUrl ? asset('assets/images/unset.jpg') : \Storage::disk('public')->url($this->image);
    }
}
