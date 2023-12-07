<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class SubMenu extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'name','menu_icon' ,'link','menu_sorting','is_active']; // Add other fillable fields as needed

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
