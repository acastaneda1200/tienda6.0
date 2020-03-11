@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
    <form action="{{route('editarCategoria', $categorias->idCategoria)}}" method="POST">
    {!! method_field('PUT') !!}    
    {!! csrf_field() !!}

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar Producto</div>
            <div class="panel-body">
                    <div class="form-group col-md-4">
                            <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" name="nombre" value="{{$categorias->nombre}}" class="form-control" id="">
                            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group col-md-4">
                            <label for="exampleInputPassword1">Descripcion</label>
                            <input type="text" name="descripcion" value="{{$categorias->descripcion}}" class="form-control" id="">
                            {!!$errors->first('descripcion', '<span class=error>:message</span>')!!}
                    </div>
                   <div class="col-md-8 ">
                        <button type="submit" class="btn btn-primary">
                        Guardar
                    </button> 
                    </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
@endsection