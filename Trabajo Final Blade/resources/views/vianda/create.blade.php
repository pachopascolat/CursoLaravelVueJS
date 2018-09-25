@extends('layouts.layout')
@section('content')
<div class="row" style="width:800px;margin: 0 auto">
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
                        <form method="POST" action="{{ route('vianda.store') }}"  role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre de la vianda" value="{{$vianda['nombre']}}">
                            </div>

                            <div class="form-group">
                                <textarea name="descripcion" class="form-control input-sm" placeholder="Descripción" ></textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" name="precio" id="precio" class="form-control input-sm" placeholder="Precio de la Vianda">
                            </div>


                            <div class="form-group">
                                <label class="">Es Vegetariano    </label><input class="right" type="checkbox" name="vegetariana" id="vegetariana" class="form-control input-sm" placeholder="">
                            </div>
                            <div
                                <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                <a href="{{ route('vianda.index') }}" class="btn btn-info btn-block" >Atrás</a>
                            </div>	
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endsection