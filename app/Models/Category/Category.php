<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;
use function PHPUnit\Framework\isNull;

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
        'parent_id',
        'created_at',
        'updated_at',
    ];

    public function posts(){
        return $this->hasMany(Categoies::class, 'category_id', 'id');
    }
    public static function getAll($faram = [], $limit = 6){

        $faram = array_merge(
            [
                'search' => Null,
                'parent_id' => []
            ],
            $faram
        );
//        dd($faram);
        $kq = self::select('categoies.*');
        if(!empty($faram['search'])){
            $kq->where('name', 'like', '%'.$faram['search'].'%');
        }

        if(is_null($faram['parent_id'])){
            $kq->whereNull('parent_id');
        } else {
            if(!empty($faram['parent_id'])){
                $parend_id= explode(',', $faram['parent_id']);
                $kq->whereIn('parent_id', $parend_id);
            }
        }

//        echo $kq->toSql();
//            exit;
        return empty($limit) ? $kq->get() : $kq->paginate($limit);

    }
    public function parents(){
        Return $this->hasMany('Category');
    }
    public function chidrends(){
        Return $this->hasMany('Category')->with('parents');
    }
}
