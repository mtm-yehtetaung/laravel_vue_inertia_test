<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link','menu_icon','menu_sorting','is_active']; // Add other fillable fields as needed

    public function subMenus()
    {
        return $this->hasMany(SubMenu::class);
    }
}
