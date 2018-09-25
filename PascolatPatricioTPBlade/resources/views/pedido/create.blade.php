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
                    <h3 class="panel-title">Crear Pedido</h3>
                </div>
                <div class="panel-body">					
                    <div class="table-container">
                        <form method="POST" action="{{ route('pedido.store') }}"  role="form">
                            {{ csrf_field() }}

                            <div  class="form-group">
                                <select name="persona_id" class="form-control">
                                    <option selected="selected" value="" disabled>Seleccione Persona</option>
                                    @foreach($personas as $key => $persona)
                                    <option  value="{{ $persona->id }} "> {{ $persona->nombre }} </option>
                                    @endforeach
                                </select>
                                            <!--<input type="text" name="persona_id" id="persona_id" class="form-control input-sm" placeholder="Persona" >-->
                            </div>
                            <div class="form-group">
                                <select  name="vianda_id" class="form-control">
                                    <option selected="selected" value="" disabled>Seleccione Vianda</option>
                                    @foreach($viandas as $key => $vianda)
                                    <option  value="{{ $vianda->id }} "> {{ $vianda->descripcion }} </option>
                                    @endforeach
                                </select>
                                            <!--<input type="text" name="persona_id" id="persona_id" class="form-control input-sm" placeholder="Persona" >-->
                            </div>


                            <div class="form-group">
                                <input type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control input-sm" placeholder="fecha solicitud">
                            </div>
                            <div class="form-group">
                                <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control input-sm" placeholder="fecha entrega">
                            </div>

                            <div class="form-group">
                                <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                <a href="{{ route('pedido.index') }}" class="btn btn-info btn-block" >Atrás</a>
                            </div>	

                    </div>
                    </form>
                </div>
            </div>

        </div>
</div>
@endsection