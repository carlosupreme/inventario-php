<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_barras',
        'categoria_id',
        'nombre',
        'descripcion',
        'costo',
        'precio',
        'precio_mayoreo',
        'cantidad_mayoreo',
        'unidad_medida',
        'stock_minimo',
        'stock_tienda',
        'stock_bodega',
        'foto'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
