<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sevices\Links\LinkService;
use App\Http\Requests\FullLinkFormRequest;

class LinkController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('links.index');
    }

    /**
     * @param FullLinkFormRequest $request
     * @param string $full_link
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(FullLinkFormRequest $request)
    {
        $full_link = $request->input('full_link');
        $service = new LinkService();
        $link = $service -> find($full_link);
        if(!$link) {
            $link = $service -> create($full_link);
        }
        return response()->json(['short_link' => route('FullLink', [$link->short_link])]);
    }

}
