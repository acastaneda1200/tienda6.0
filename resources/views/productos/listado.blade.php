<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Cantidad</th>
        <th>Estado</th>
        <th>Vendedor</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
    
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->cantidad}}</td>
            <td>
              <div class="form-group col-md-9">
                
              <select class="form-control cboEstado" data-id="{{$producto->idProducto}}" name="estado" id="">
                        @foreach ($estado as $item)
                        <option value="{{$item['ID']}}"
                        @if($producto->estado == $item['ID']) selected @endif
                        >{{$item['DESCRIPCION']}}</option>
                        @endforeach
                </select>
            </div>
            </td>
            <td>{{$producto->vendedor}}</td>
            <td class="btn btn-group">
            <a href="{{route('getProducto', $producto->idProducto)}}" title="Editar"  class="btn btn-primary btnEditar">
                <i class="fa fa-edit"></i></a>
            <form method="POST" action="{{route('deleteProducto', $producto->idProducto)}}">
              {!! method_field('DELETE') !!}    
              {!! csrf_field() !!}
              <button title="Eliminar"  class="btn btn-danger btnEliminar">
                <i class="fa fa-remove"></i></button>
            </form>
                
            </td>
          </tr>
        @endforeach
     
   
    </tbody>
  </table>