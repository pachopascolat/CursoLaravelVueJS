@extends('layouts.layout')
@section('content')
<section>
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
                    <h3 class="panel-title">Crear Persona</h3>
                </div>
                <div class="panel-body">					
                    <div class="table-container">
                        <form method="POST" action="{{ route('persona.store') }}"  role="form">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre de la persona" >
                            </div>

                            <div class="form-group">
                                <input type="text" name="apellido" class="form-control input-sm" placeholder="apellido" ></input>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="precio" class="form-control input-sm" placeholder="email">
                            </div>

                            <div class="form-group">
                                <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                <a href="{{ route('persona.index') }}" class="btn btn-info btn-block" >Atrás</a>
                            </div>	

                    </div>
                    </form>
                </div>
            </div>

        </div>
</div>
</section>
@endsection