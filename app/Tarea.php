<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [ //datos que podemos modificar 
        'nombre', 'descripcion','responsable', 'fechaFin','created_at','delete'
    ];

    public function tareas(){
        return $this->belongsTo(Tarea::class);
    }

    public function getTareaNameAttribute(){
        
        if($this->tarea)
            return $this->proyecto->nombre;

        return 'General';
    }
}
