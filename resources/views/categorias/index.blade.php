@extends('layouts.app')

@section('content')

<div class="row">
    <div class="container">
            <form action="{{route('categoriasAgregar')}}" method="POST">
            
                    {!! csrf_field() !!}
    
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Mantener Categorias</div>
                            <div class="panel-body">
                                    <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Nombre</label>
                                    <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" id="exampleInputPassword1">
                                            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
                                    </div>
                                    <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Descripcion</label>
                                            <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" id="exampleInputPassword1">
                                            {!!$errors->first('descripcion', '<span class=error>:message</span>')!!}
                                    </div>
                                    <div class="col-md-8 ">
                                        <button type="submit" class="btn btn-primary">
                                        Agregar
                                    </button> 
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
                @include('categorias.listado')
    </div>
    </div>

@endsection