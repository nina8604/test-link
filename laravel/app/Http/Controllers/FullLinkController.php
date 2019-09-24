<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sevices\Links\LinkService;


class FullLinkController extends Controller
{
    /**
     * @param string $short_link
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
//    public function index(Request $request)
    public function index(string $short_link)
    {
//        $pathInfo = substr($request->getPathInfo(), 1);
            try{
                $service = new LinkService;
                $link = $service -> findByShortLink ($short_link);
//                $link = DB::table('links')->where('short_link', $pathInfo)->first();
                return redirect($link->full_link);
            }catch(\Exception $exception){
                echo "По данной ссылке http://localhost/$short_link ничего не найдено";
//                echo "По данной ссылке http://localhost/$pathInfo ничего не найдено";
            }
    }
}
