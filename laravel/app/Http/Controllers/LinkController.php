<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        if (!empty($full_link = $request->input('full_link'))) {
            if (!filter_var($full_link, FILTER_VALIDATE_URL) === false) {
                $link_exist = DB::table('links')->where('full_link', $full_link)->first();
                if ($link_exist){
                    return view('links.show', [ 'short_link' => $link_exist->short_link]);
                }else {
                    $link = Link::create([
                        'full_link' => $full_link,
                        'short_link' => substr(md5(rand(0,mt_getrandmax())),0,6),
                    ]);
                    return view('links.show', [ 'short_link' => $link->short_link]);
                }

            } else {
                return view('links.error');
            }
        }

    }

}
