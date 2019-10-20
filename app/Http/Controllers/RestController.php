<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Menu;
use App\Submenu;
use App\DataUpdate;

class RestController extends Controller
{
    public function menu()
    {
    	$data=Menu::all();
        return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    public function submenu(){
    	$recipe=Submenu::join('menu','submenu.mid','menu.id')->select('menu.name_English as ne','submenu.*')->get();
    	return response()->json($recipe, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }
    public function UpdateCheck(){
    	$data=DataUpdate::all();
    	return response()->json($data);
    }

    public function checkupdate(Request $request)
    {
    	if($request->has("lid")){
    		$lid=$request->input("lid");
    		$data=DataUpdate::with("menu","submenu")->where("id",">",$lid)->get();
    		return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    	}else{
    		return response()->json([]);
    	}
    }
}
