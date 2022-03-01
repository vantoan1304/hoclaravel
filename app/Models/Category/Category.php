<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const TABLE = 'categoies';
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
    public static function getAll($faram = [], $limit = 6){

        $faram = array_merge(
            [
                'search' => Null
            ],
            $faram
        );
//        dd($faram);
        $kq = self::select('categoies.*');
        if(!empty($faram['search'])){
            $kq->where('name', 'like', '%'.$faram['search'].'%');
        }
//        dd($kq->toSql());
        return empty($limit) ? $kq->get() : $kq->paginate($limit);
    }
}
