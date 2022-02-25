<?php

namespace App\Models\Pots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const TABLE = 'pots';
    private $table = self::TABLE;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public function category(){
        return $this->belongsTo(posts::class, 'category_id', 'id');
    }
}

