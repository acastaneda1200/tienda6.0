@extends('layouts.app')

@section('content')

<div class="row">
        <div class="container">
                <form action="{{route('categoriasAgregar')}}" method="POST">

                        {!! csrf_field() !!}

                        <div class="col-md-12">
                                <div class="card bg-light mb-3">

                                        <div class="card-header">Mantener Productos</div>
                                        <div class="card-body">
                                                <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                                <label for="exampleInputPassword1">Nombre</label>
                                                                <input type="text" name="nombre"
                                                                        value="{{old('nombre')}}" class="form-control"
                                                                        id="exampleInputPassword1">
                                                                {!!$errors->first('nombre', '<span
                                                                        class=error>:message</span>')!!}
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                                <label for="exampleInputPassword1">Descripcion</label>
                                                                <input type="text" name="descripcion"
                                                                        value="{{old('descripcion')}}"
                                                                        class="form-control" id="exampleInputPassword1">
                                                                {!!$errors->first('descripcion', '<span
                                                                        class=error>:message</span>')!!}
                                                        </div>

                                                        <div class="col-md-8 ">
                                                                <button type="submit" class="btn btn-primary">
                                                                        Agregar
                                                                </button>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </form>
                <div class="col-md-12">
                        <div class="card bg-light">
                                <div class="card-header">Listado de Productos</div>
                                <div class="card-body">
                                        @include('categorias.listado')
                                </div>
                        </div>
                </div>
        </div>
</div>

@endsection