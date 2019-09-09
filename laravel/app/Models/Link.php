<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'full_link', 'short_link'
    ];
    public function createShortLink($fillable){
        $shortLink = 'http://localhost/'.substr(md5(rand(0,mt_getrandmax())),0,6);
        $this->create([
            'full_link' => $fillable['full_link'],
            'short_link' => $shortLink,
        ]);
    }
}
