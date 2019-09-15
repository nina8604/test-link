<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FullLinkController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index(Request $request)
    {
        $pathInfo = substr($request->getPathInfo(), 1);
            try{
                $link = DB::table('links')->where('short_link', $pathInfo)->first();
                return redirect($link->full_link);
            }catch(\Exception $exception){
                echo "По данной ссылке http://localhost/$pathInfo ничего не найдено";
            }
    }
}
