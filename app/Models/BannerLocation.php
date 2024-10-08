<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerLocation extends Model
{
    use HasFactory;

    public function page(){
        return $this->belongsTo(Page::class);
    }
}
