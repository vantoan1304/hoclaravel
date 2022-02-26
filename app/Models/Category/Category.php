<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const TABLE = 'Categoies';
    protected $table = self::TABLE;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'weight',
        'created_at',
        'updated_at',
    ];

    public function posts(){
        return $this->hasMany(Categoies::class, 'category_id', 'id');
    }
}
