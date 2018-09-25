@extends('layouts.layout')
@section('content')
<div class="row" style="width:800px;margin: 0 auto">
    <section class="content" >
        <div class="col-md-8 col-md-offset-2">
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
                    <h3 class="panel-title">Editar Pedido</h3>
                </div>
                <div class="panel-body">					
                    <div class="table-container">
                        <form method="POST" action="{{ route('pedido.store') }}"  role="form">
                            {{ csrf_field() }}

                            <div  class="form-group">
                                <select name="persona_id" class="form-control">
                                    <!--<option selected="selected" value="" disabled>Seleccione Persona</option>-->
                                    @foreach($personas as $key => $persona)
                                    <option selected="{{$persona->id==$pedido->persona_id?'selected':false}}"  value="{{ $persona->id }} "> {{ $persona->nombre }} </option>
                                    @endforeach
                                </select>
                                            <!--<input type="text" name="persona_id" id="persona_id" class="form-control input-sm" placeholder="Persona" >-->
                            </div>
                            <div class="form-group">
                                <select  name="vianda_id" class="form-control">
                                    <!--<option selected="selected" value="" disabled>Seleccione Vianda</option>-->
                                    @foreach($viandas as $key => $vianda)
                                    <option selected="{{$vianda->id==$pedido->vianda_id?'selected':false}}"  value="{{ $vianda->id }} "> {{ $vianda->descripcion }} </option>
                                    @endforeach
                                </select>
                                            <!--<input type="text" name="persona_id" id="persona_id" class="form-control input-sm" placeholder="Persona" >-->
                            </div>


                            <div class="form-group">
                                <input value="{{$pedido->fecha_solicitud}}" type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control input-sm" placeholder="fecha solicitud">
                            </div>
                            <div class="form-group">
                                <input  value="{{$pedido->fecha_entrega}}"  type="date" name="fecha_entrega" id="fecha_entrega" class="form-control input-sm" placeholder="fecha entrega">
                            </div>

                            <div class="form-group">
                                <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                <a href="{{ route('pedido.index') }}" class="btn btn-info btn-block" >Atrás</a>
                            </div>	

                    </div>
                    </form>
                </div>
            </div>

        </div>
</div>
<!--<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
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
					<h3 class="panel-title">Crear Vianda</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('vianda.update',$vianda->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$vianda->nombre}}">
									</div>
								</div>
							</div>

							<div class="form-group">
								<textarea name="descripcion" class="form-control input-sm"  placeholder="Descripción">{{$vianda->descripcion}}</textarea>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="precio" id="precio" class="form-control input-sm" value="{{$vianda->precio}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="vegetariana" id="vegetariana" class="form-control input-sm" value="{{$vianda->vegetariana}}">
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('vianda.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>-->
	@endsection