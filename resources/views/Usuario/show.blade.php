@extends('layouts.layout')
@section('content')

<div class="row">
	<section class="content">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
                <h3 class="panel-title">Datos del Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="GET" action="#"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="apellido">Apellidos:</label>
										<input type="text" name="apellido" id="apellido" class="form-control input-sm" value="{{$usuarios->apellido}}" disabled>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="nombre">Nombres:</label>
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$usuarios->nombre}}" disabled>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="fechaNacimiento">Fecha de Nacimiento:</label>
										<input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control input-sm col-md-10" min="1900-01-01" max="2020-01-01" value="{{$usuarios->fechaNacimiento}}" disabled>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="edad">Edad:</label>
										<input type="text" name="edad" id="edad" class="form-control input-sm" value="{{$edad=\Carbon\Carbon::parse($usuarios->fechaNacimiento)->age}}" disabled>
									</div>
								</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">Email:</label>
										<input type="mail" name="email" id="email" class="form-control input-sm" value="{{$usuarios->email}}" disabled>
									</div>
								</div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="tel" name="telefono" id="telefono" class="form-control input-sm" pattern="[0-9]{10}" value="{{$usuarios->telefono}}" disabled>
                                    </div>
                                </div>
                            </div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<a href="{{ route('usuario.index') }}" class="btn btn-info btn-block" >Volver</a>
								</div>	
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
    </section>
</div>
@endsection