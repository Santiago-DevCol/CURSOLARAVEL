<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        /*Otras consultas: 
            ::where(); ->para filtrar en la nosnluta, por ejemplo un like es ::where('age''like',18)
            orwhere();
        */
        //return view( 'users.index', [ "users" => $users ] );

        //where pudede recibir tres parametros para la comparación de resultados
            //$users = User::where('age', 30)->orWhere('address', '!=', 'calle 1 no 2-3');
        $users = User::where('age', 30)
            ->orWhere('address', '!=', 'calle 1 no 2-3')
            ->orderBy('age', 'desc')
            //->take(1)
            ->first()
            ->get();
        //para buscar un usuario por el id usar el atajo find()]
            //$users = User::find(1)
            //findOrFail() para devolver error en caso de no encontrar datos
        // otro metod es compact para generar el  array con sus valores

        //para ejecutar alguna consulta sql directa usamos DB
        //$users = DB::select( DB::raw("SELECT * FROM users WHERE age <= 25") );

        return view('user.index', compact('users'));
    }

    public function create(){
        $user = new User;
        $user ->name = 'Santi';
        $user ->email = 'santi@gmail.com';
        $user->password = Hash::make('12345');
        $user-> age = 25;
        $user->address = 'calle 1 no 2-3';
        $user->zip_code = 290909;
        $user -> save();

        User::create([
            "name" => "RUIZ",
            "email" => "RUIZ@RUIZ.COM",
            "password" => Hash::make('12345'),
            "age" => 42,
            "address" => "PRUEBA2",
            "zip_code" => 290909
        ]);

        User::create([
            "name" => "JUAN",
            "email" => "JUAN@JUAN.COM",
            "password" => Hash::make('12345'),
            "age" => 42,
            "address" => "PRUEBA2",
            "zip_code" => 290909
        ]);
        
        User::create([
            "name" => "PEDRO",
            "email" => "PEDRO@PEDRO.COM",
            "password" => Hash::make('12345'),
            "age" => 49,
            "address" => "PRUEBA2",
            "zip_code" => 290909
        ]);

        return redirect()->route('user.index');

    }
}
