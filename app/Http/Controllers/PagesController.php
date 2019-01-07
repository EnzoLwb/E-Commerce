<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /*
     * PagesController 处理所有自定义页面的逻辑 */

    /*
     * 首页展示
     */
    public function root()
    {
        return view('pages.root');
    }



}
