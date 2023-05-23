<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];
    public function categoria()
    // relacion  vacante tiene muchas categorias
    {
        return $this->belongsTo(Categoria::class);
    }

    // relacion vacante con salarios
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    //relacion vacante tiene muchos candidatos candidatos
    public function candidatos(){
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }

    //relacion de las Notificaciones
    //relacion de 1a1 una vacante pertenece a un usuario
    public function reclutador(){
        return $this->belongsTo(User::class,'user_id');
    }

}
