<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'full_link', 'short_link'
    ];
    public function creatShortLink($fillable){
        $shortLink = '123456';
        $this->create([
            'short_link' => $shortLink,
        ]);
    }
}
