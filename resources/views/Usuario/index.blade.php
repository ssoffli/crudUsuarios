@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Usuarios</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('usuario.create') }}" class="btn btn-info" >Añadir Usuario</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Apellido</th>
               <th>Nombre</th>
               <th>Edad</th>
               <th>Email</th>
               <th>Teléfono</th>
               <th>Ver</th>
               <th>Editar</th>
               <th>Borrar</th>
             </thead>
             <tbody>

              @if($usuarios->count())  
              @foreach($usuarios as $usuario)  
              <tr>
                <td>{{$usuario->apellido}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$edad=\Carbon\Carbon::parse($usuario->fechaNacimiento)->age}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->telefono}}</td>
                <td><a class="btn btn-success btn-xs" href="{{action('UsuarioController@show', $usuario->id)}}" ><span class="glyphicon glyphicon-search"></span></a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('UsuarioController@edit', $usuario->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('UsuarioController@destroy',$usuario->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>  
                </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay usuarios cargados!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $usuarios->links() }}
    </div>
  </div>
</section>

@endsection