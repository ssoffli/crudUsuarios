<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;
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
    public function store(UsuarioStoreRequest $request)
    {
        // Validacion a traves del form request
        Usuario::create($request->all());
        return redirect()->route('usuario.index')->with('message','Usuario creado con exito');
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
    public function update(UsuarioUpdateRequest $request, $id)
    {
        // Validacion a traves del form request
        Usuario::find($id)->update($request->all());
        return redirect()->route('usuario.index')->with('message','Usuario actualizado con exito!');
    }

    /**
     * Elimina el usuario por su id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::find($id)->delete();
        return redirect()->route('usuario.index')->with('message','Usuario eliminado con exito!');
    }
}
