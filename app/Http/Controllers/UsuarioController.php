<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Muestra el listado de Usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=Usuarios::orderBy('id','DESC')->paginate(3);
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
        $this->validate($request,[ 'apellido'=>'required', 'nombre'=>'required', 'fechaNacimiento'=>'required', 'email'=>'required', 'telefono'=>'required']);
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
        return view('usuario.edit',compact('usuarios'));
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
        $this->validate($request,[ 'apellido'=>'required', 'nombre'=>'required', 'fechaNacimiento'=>'required', 'email'=>'required', 'telefono'=>'required']);
 
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
