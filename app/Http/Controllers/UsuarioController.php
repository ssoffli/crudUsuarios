<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Muestra el listado de Usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=Usuario::orderBy('apellido','ASC')->paginate(10);
        return view('Usuario.index',compact('usuarios'));
    }

    /**
     * Muestra el formulario para crear usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usuario.create');
    }

    /**
     * Guarda un usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion de los campos del formulario
        $this->validate($request,
        [ 
            'apellido'=>'required|max:255', 
            'nombre'=>'required', 
            'fechaNacimiento'=>'required', 
            'email'=>'required|max:255|email|unique:usuarios', 
            'telefono'=>'required|max:10'
        ],
        // Mensajes para validación
        [
            'apellido.required' => 'Ingrese un apellido, no puede quedar en blanco!',
            'apellido.max' => 'Apellido muy largo. Ingrese hasta 255 caracteres',
            
            'nombre.required' => 'Ingrese un nombre, no puede quedar en blanco!',
            'nombre.max' => 'Nombre muy largo. Ingrese hasta 255 caracteres',
            
            'fechaNacimiento.required' => 'Ingrese una fecha, el campo no puede quedar en blanco!',
            'fechaNacimiento.required' => 'Ingrese una fecha valida. Formato AAAA/MM/DD',
            
            'email.required' => 'El campo email no puede quedar en blanco!',
            'email.email' => 'Ingrese un email valido, asegurese de escribir el @',
            'email.max' => 'Email muy largo. Ingrese hasta 255 caracteres',
            'email.unique' => 'El correo ingresado ya existe, pruebe con un email diferente...',
            
            'telefono.required' => 'El telefono no puede quedar en blanco!',
            'telefono.max' => 'El telefono debe contener máximo 10 dígitos'
        ]);
        Usuario::create($request->all());
        return redirect()->route('usuario.index')->with('success','Usuario creado con exito');
    }

    /**
     * Muestra un usuario en particular.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios=Usuario::find($id);
        return  view('usuario.show',compact('usuarios'));
    }

    /**
     * Muestra el formulario para editar usuarios.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=Usuario::find($id);
        return view('usuario.edit',compact('usuario'));
    }

    /**
     *Actualiza el usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Validacion de los campos del formulario
        $this->validate($request,
        [ 
            'apellido'=>'required|max:255', 
            'nombre'=>'required', 
            'fechaNacimiento'=>'required', 
            'email'=>'required|max:255|email', 
            'telefono'=>'required|max:11'
        ],
        // Mensajes para validación
        [
            'apellido.required' => 'Ingrese un apellido, no puede quedar en blanco!',
            'apellido.max' => 'Apellido muy largo. Ingrese hasta 255 caracteres',
            
            'nombre.required' => 'Ingrese un nombre, no puede quedar en blanco!',
            'nombre.max' => 'Nombre muy largo. Ingrese hasta 255 caracteres',
            
            'fechaNacimiento.required' => 'Ingrese una fecha, el campo no puede quedar en blanco!',
            'fechaNacimiento.required' => 'Ingrese una fecha valida. Formato AAAA/MM/DD',
            
            'email.required' => 'El campo email no puede quedar en blanco!',
            'email.email' => 'Ingrese un email valido, asegurese de escribir el @',
            'email.max' => 'Email muy largo. Ingrese hasta 255 caracteres',
            
            'telefono.required' => 'El telefono no puede quedar en blanco',
            'telefono.max' => 'El telefono debe contener máximo 11 dígitos'
        ]);
        Usuario::find($id)->update($request->all());
        return redirect()->route('usuario.index')->with('success','Usuario actualizado con exito!');
    }

    /**
     * Elimina el usuarios por su id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::find($id)->delete();
        return redirect()->route('usuario.index')->with('success','Usuario eliminado con exito!');
    }
}
