<?php

namespace App\Http\Controllers;
use App\Models\Asset;
use App\Models\Book;
use App\Models\Menu;
use App\Models\SubMenu;
use Inertia\Inertia;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(5);
        return Inertia::render('Books', ['books' => $books]);
    }

    public function showAsset()
    {
        return Inertia('Assets', [
            'assets' => Asset::all()
        ]);
    }

    public function showDepreciation()
    {
       
        return Inertia::render('Depreciation');
    }
    

    public function createAssets()
    {
       
        return Inertia('AssetsRegister', [
            'assets' => Asset::latest()->paginate(5)
        ]);
    }

    public function registerAssets(Request $request)
    {
        $sampleData = [
            'code' => $request->code,
            'assets_class' => $request->assetClass,
            'assets_name' =>$request->assetName,
            'active' => $request->active == true? 1 : 0
        ];
       Asset::create($sampleData);

         
    }

    public function createMenu()
    {
        $sampleData = [
            'menu_id' => 1,
            'name'=>'Assets Register',
            'link' => 'assetsRegister',
           'menu_sorting'=>2,
           'is_active' =>true
        ];

        SubMenu::create($sampleData);
    }

    public function updateAssets(Request $request,Asset $id)
    {
        $sampleData = [
            'code' => $request->code,
            'assets_class' => $request->assetClass,
            'assets_name' =>$request->assetName,
            'active' => $request->active == true? 1 : 0
        ];
       $id->update($sampleData);
    }


}


