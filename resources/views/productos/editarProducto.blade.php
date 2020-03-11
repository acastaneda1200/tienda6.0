@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
    <form action="{{route('editarProducto', $producto->id)}}" method="POST">
    {!! method_field('PUT') !!}    
    {!! csrf_field() !!}

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar Producto</div>
            <div class="panel-body">
                    <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" name="nombre" value="{{$producto->nombre}}" class="form-control" id="">
                            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Descripcion</label>
                            <input type="text" name="descripcion" value="{{$producto->descripcion}}" class="form-control" id="">
                            {!!$errors->first('descripcion', '<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group col-md-2">
                            <label for="exampleInputPassword1">Cantidad</label>
                            <input type="number" name="cantidad" value="{{$producto->cantidad}}" class="form-control" id="">
                            {!!$errors->first('cantidad', '<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputPassword1">Estado</label>
                        <select class="form-control cboEstado" name="estado" id="">
                                @foreach ($estado as $item)
                        <option value="{{$item['ID']}}"
                        @if($producto->estado == $item['ID']) selected @endif
                        >{{$item['DESCRIPCION']}}</option>
                        @endforeach

                            

                               
                     
        
                        </select>
                      
                    </div>

                    <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">

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