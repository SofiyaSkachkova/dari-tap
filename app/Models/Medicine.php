<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    // Разрешённые поля для массового заполнения
    protected $fillable = ['category_id', 'name', 'image', 'price'];

    // Связь "принадлежит категории"
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
