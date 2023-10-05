<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'custo', 'preco', 'quantidade', 'category_id'];




    public function category()
    {
        return $this->belongsTo(Categoria::class);
    }

}
