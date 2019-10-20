<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use DB;
use App\Menu;
use App\Submenu;
use App\DataUpdate;

class Home extends Controller
{
    public function menu(){
        $data=Menu::all();
        return view('menu')->with(["menues"=>$data]);
    }

    public function Submenu(){
         $data=Menu::all();
         return view('submenu')->with(["SubMenu"=>$data]);
    }

    public function SaveMenu(Request $request){
        $validatedData = $request->validate([
            'nameG' => 'required',
            'nameH' => 'required',
            'nameE' => 'required',
            'mimg' => 'required|image',
        ]);

        $filenamewithextension = $request->file('mimg')->getClientOriginalName();

        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        $extension = $request->file('mimg')->getClientOriginalExtension();

        $filenametostore = $filename.'_'.time().'.'.$extension; //Filename To Save
        Storage::disk('s3')->put($filenametostore, fopen($request->file('mimg'), 'r+'), 'public');

        $data=[
                "name_Gujrati"      => $request->input("nameG"),
                "name_Hindi"      => $request->input("nameH"),
                "name_English"      => $request->input("nameE"),
                "image"     => $filenametostore,
            ];
        $plan = Menu::create($data);
        return redirect()->back();
    }

    public function savesubmenu(Request $request){
            $validatedData = $request->validate([
               'drpmenu'   =>   'required',
               'subname'   =>   'required',
               'hindirecipy' => 'required',
               'englishrecipy' =>'required',
               'simg'      =>    'required|image',
               'disgujrati' =>   'required',
               'dishindi'  =>     'required',
               'disenglish' =>   'required',
        ]);

        $filenamewithextension = $request->file('simg')->getClientOriginalName();
         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
         $extension = $request->file('simg')->getClientOriginalExtension();
         $filenametostore = $filename.'_'.time().'.'.$extension; //Filename To Save
        Storage::disk('s3')->put($filenametostore, fopen($request->file('simg'), 'r+'), 'public');
               $data=[
                "mid"      => $request->input("drpmenu"),
                "name_Gujrati" =>$request->input("subname"),
                "name_Hindi"     => $request->input("hindirecipy"),
                "name_English"     => $request->input("englishrecipy"),
                "image"     => $filenametostore,
                "discription_Gujrati" => $request->input("disgujrati"),
                "discription_Hindi" => $request->input("dishindi"),
                "discription_English" => $request->input("disenglish"),
            ];
             $plan = SubMenu::create($data);
             return redirect()->back();

            

    }

    public function deletemenu($id){
        Menu::find($id)->delete();
        return redirect()->back();
    }

    public function UpdateMenuGet($id)
    {
        $menu=Menu::Where('id',$id)->get();
        return view('update',compact('menu'));
    }
    public function UpdateMenu(Request $request)
    {
        $post=$request->all();
        if (Input::hasFile('mimg')) 
        {
                $filenamewithextension = $request->file('mimg')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('mimg')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.time().'.'.$extension; //Filename To Save
                Storage::disk('s3')->put($filenametostore, fopen($request->file('mimg'), 'r+'), 'public');
                $data=[
                    "name_Gujrati"      => $request->input("nameG"),
                    "name_Hindi"      => $request->input("nameH"),
                    "name_English"      => $request->input("nameE"),
                    "image"     => $filenametostore,
            ];
        }
        else
        {
            $data=[
                "name_Gujrati"      => $request->input("nameG"),
                "name_Hindi"      => $request->input("nameH"),
                "name_English"      => $request->input("nameE"),
            ];
        }
        Menu::find($post['mid'])->update($data);
        DataUpdate::create(["mid"=>$post['mid'],"sid"=>0]);
        return redirect('/Menu');
    }
    public function getRecipes()
    {
        $data=Menu::all();
        return view('recipes')->with(["menues"=>$data]);   
    }

    public function showrecipe()
    {
        $recipe=Submenu::join('menu','submenu.mid','menu.id')->select('menu.name_English as ne','submenu.*')->get();
        return view('showrecipe',compact('recipe'));
    }
    public function getRecipeContent(Request $request)
    {
        $post=$request->all();
        $recipe=Submenu::join('menu','submenu.mid','menu.id')->where('submenu.id',$post['id'])->select('menu.name_English as ne','menu.name_Hindi as nh','menu.name_Gujrati as ng','submenu.*')->get();
        return response()->json($recipe);
    }

    public function updaterecipes($id)
    {
        $data=Menu::all();
        $recipe=Submenu::find($id);
        return view('updaterecipes',compact('data','recipe'));  
    }
    public function updatesubmenu(Request $request)
    {
        $post=$request->all();
        $validatedData = $request->validate([
               'drpmenu'   =>   'required',
               'subname'   =>   'required',
               'hindirecipy' => 'required',
               'englishrecipy' =>'required',
               'disgujrati' =>   'required',
               'dishindi'  =>     'required',
               'disenglish' =>   'required',
        ]);
        if(Input::hasFile('simg'))
        {
            $filenamewithextension = $request->file('simg')->getClientOriginalName();
             $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
             $extension = $request->file('simg')->getClientOriginalExtension();
             $filenametostore = $filename.'_'.time().'.'.$extension; //Filename To Save
            Storage::disk('s3')->put($filenametostore, fopen($request->file('simg'), 'r+'), 'public');
                   $data=[
                    "mid"      => $request->input("drpmenu"),
                    "name_Gujrati" =>$request->input("subname"),
                    "name_Hindi"     => $request->input("hindirecipy"),
                    "name_English"     => $request->input("englishrecipy"),
                    "image"     => $filenametostore,
                    "discription_Gujrati" => $request->input("disgujrati"),
                    "discription_Hindi" => $request->input("dishindi"),
                    "discription_English" => $request->input("disenglish"),
                ];
        }
        else
        {
            $data=[
                    "mid"      => $request->input("drpmenu"),
                    "name_Gujrati" =>$request->input("subname"),
                    "name_Hindi"     => $request->input("hindirecipy"),
                    "name_English"     => $request->input("englishrecipy"),
                    "discription_Gujrati" => $request->input("disgujrati"),
                    "discription_Hindi" => $request->input("dishindi"),
                    "discription_English" => $request->input("disenglish"),
                ];
        }
        $plan = SubMenu::find($post['id'])->update($data);
        DataUpdate::create(["mid"=>0,"sid"=>$post['id']]);
        return redirect('/showrecipe');

    }
    public function deleterecipe($id){
        SubMenu::find($id)->delete();
        return redirect()->back();
    }
}
