@extends('layouts.app')

@section('content')
<div class="row">
<div class="container">
        <form action="{{route('productosAgregar')}}" method="POST">
        
                {!! csrf_field() !!}
                <div class="col-md-12">
                <div class="card bg-light mb-3">
                 
                        <div class="card-header">Mantener Productos</div>
                        <div class="card-body">
                                <div class="form-row">
                                <div class="form-group col-md-3">
                                        <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" id="exampleInputPassword1">
                                        {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
                                </div>
                                <div class="form-group col-md-3">
                                        <label for="exampleInputPassword1">Descripcion</label>
                                        <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" id="exampleInputPassword1">
                                        {!!$errors->first('descripcion', '<span class=error>:message</span>')!!}
                                </div>
                                <div class="form-group col-md-2">
                                        <label for="exampleInputPassword1">Cantidad</label>
                                        <input type="number" name="cantidad" value="{{old('cantidad')}}" class="form-control" id="exampleInputPassword1">
                                        {!!$errors->first('cantidad', '<span class=error>:message</span>')!!}
                                </div>

                                <div class="form-group col-md-3">
                                        <label for="exampleInputPassword1">Categorias</label>
                                        <select class="form-control" name="estado" id="">
                                                <option value="">Seleccione</option>
                                                  @foreach ($categorias as $categoria)
                                                  <option value="{{$categoria->idCategoria}}">{{$categoria->cat_des}}</option>
                                                  @endforeach
                                          </select>
                                      </div>   
                           
                                <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">

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
            @include('productos.listado')
            </div>
            </div>
        </div>
</div>
</div>

    
            
@endsection
@section('scripts')
<script>
        $(function() {
                $('.cboEstado').on('change', function () {
                var estado = $(this).val()
                var idProducto = $(this).data("id")
                $.confirm({
                        title: 'Alerta!',
                        content: 'Esta seguro de guardar los cambios',
                        type: 'green',  
                                        typeAnimated: true, 
                        buttons: {
                                confirmar: {
                                        btnClass: 'btn-success',
                                        text: 'confirmar',  
                                                
                                        action: function(){
                                                $.ajax({
                                                url: "{{route('updateEstado')}}",
                                                method: 'POST',
                                                data: {
                                                        "_token": "{{ csrf_token() }}",
                                                        estado: estado,
                                                        idProducto,
                                                        idProducto
                                                }
                                        }).done(function (data) {
                                                
                                        })
                                        }           
        
        
                                },
                                cancelar: function () {
        
                                }
        
                        }
                });
        
        
        });
              
        
        });  
        </script> 
@endsection
 

