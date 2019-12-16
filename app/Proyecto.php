<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Proyecto extends Model{
    protected $fillable = [ //datos que podemos modificar 
        'nombre', 'descripcion','buscador','responsable', 'fechaFin','created_at','delete'
    ];
    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
