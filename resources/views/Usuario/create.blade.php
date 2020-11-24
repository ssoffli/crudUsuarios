@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-6 col-md-offset-3">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('usuario.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="apellido">Apellidos:</label>
										<input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="Ingrese los Apellidos">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="nombre">Nombres:</label>
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Ingrese los nombres">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="fechaNacimiento">Fecha de Nacimiento:</label>
										<input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control input-sm col-md-10" min="1900-01-01" max="2019-11-20">">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="email">Email:</label>
										<input type="mail" name="email" id="email" class="form-control input-sm" placeholder="Ingrese el email">
									</div>
								</div>
                            </div>
                            <div class="row col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
									<label for="telefono">Teléfono:</label>
									<input type="tel" name="telefono" id="telefono" class="form-control input-sm" pattern="[0-9]{10}" autocomplete="off" placeholder="Ingrese sólo 10 números">
                                </div>
                            </div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
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