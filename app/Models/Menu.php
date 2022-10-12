<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title','route','order', 'parent_id'];
    protected $visible = ['title','route','order', 'parent_id'];

    public function parent() {
        return $this->hasOne('App\Models\Menu', 'id', 'parent_id')->orderBy('order');
    }

    public function children() {

        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderBy('order');
    }

    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('order')->get();
    }

    public function getParentTitle() {
        return $this->parent->title ?? '';
    }
}
