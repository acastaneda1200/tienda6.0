@extends('layouts.app')

@section('content')
<div class="row">
<div class="container">
        <form action="{{route('productosAgregar')}}" method="POST">
        
                {!! csrf_field() !!}

                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Mantener Productos</div>
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
                                <div class="form-group col-md-2">
                                        <label for="exampleInputPassword1">Cantidad</label>
                                        <input type="number" name="cantidad" value="{{old('cantidad')}}" class="form-control" id="exampleInputPassword1">
                                        {!!$errors->first('cantidad', '<span class=error>:message</span>')!!}
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
            </form>
            @include('productos.listado')
</div>
</div>

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


