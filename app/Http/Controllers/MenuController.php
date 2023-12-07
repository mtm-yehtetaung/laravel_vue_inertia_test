<?php

namespace App\Http\Controllers;

use App\Models\SubMenu;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
class MenuController extends Controller
{
    public function index()
    {
        $routeArray = [];
        $routes = Route::getRoutes();
        foreach($routes as $route){
            if($route->getName() != ''){
                array_push($routeArray, $route->getName());
            }
        }
        return Inertia::render('MenuInput',[
            'routes' => $routeArray

        ]);

    }

    public function storeMenu(Request $request){
      
        
           Menu::create($request->all());
           $updatedMenus = Menu::with(['subMenus' => function ($query) {
            $query->orderBy('menu_sorting');
        }])
            ->orderBy('menu_sorting')
            ->get()
            ->toArray();
            Inertia::share('menus',$updatedMenus);
        return redirect()->route('menu.index');
    }

    public function storeSubmenu(Request $request){
        SubMenu::create($request->all());
        $updatedMenus = Menu::with(['subMenus' => function ($query) {
         $query->orderBy('menu_sorting');
     }])
         ->orderBy('menu_sorting')
         ->get()
         ->toArray();
         Inertia::share('menus',$updatedMenus);
     return redirect()->route('menu.index');
    }
}
