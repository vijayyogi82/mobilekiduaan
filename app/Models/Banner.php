<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'is_deleted'
    ];

    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function location(){
        return $this->belongsTo(BannerLocation::class);
    }
}
