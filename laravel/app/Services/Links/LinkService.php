<?php

namespace App\Sevices\Links;

use App\Models\Link;


class LinkService {
    public function create(string $full_link){
        $link = Link::create([
            'full_link' => $full_link,
            'short_link' => $this -> generateShortLink(),
        ]);
        return $link;
    }
    public function find(string $full_link){
        return LInk::where('full_link', $full_link)->first();
    }
    public function findByShortLink(string $short_link): Link {
        return Link::where('short_link', $short_link)->first();
    }
    public function generateShortLink(): string {
        return substr(md5(rand(0,mt_getrandmax())),0,6);
    }
}


