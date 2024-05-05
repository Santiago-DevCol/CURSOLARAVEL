<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = "notes";

    //fillable sirve para indicar que campos del objeto [table] se pueden editar según la orden indicada
    // protected $fillable = [
    //     "tilte",
    //     "description",
    //     "deadline",
    //     "done"
    // ];

    //Es lo contrario a fillable, guarded, se encarga de proteger los campos definidos, por defecto protege todo lo que no está en fillable
    //protected $guarded =
    
    //Ayuda a forzar el casteo de datos
    // protected $casts = [
    //     "deadline" => "date"
    // ];

    //Ayuda a especificar un array para evitar la entrega de datos en una serie JSON
    //protected $hidden=["password"];

    /**
     * laravel tiene una ayuda para crear migraciones con modelos
     * php artisan make:model Author --migration
     */
}
