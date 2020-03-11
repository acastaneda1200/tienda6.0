<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
        
        @foreach ($categorias as $categoria)
    
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$categoria->nombre}}</td>
            <td>{{$categoria->descripcion}}</td>
         
            <td class="btn btn-group">
            <a href="{{route('getCategoria', $categoria->idCategoria)}}" title="Editar"  class="btn btn-primary btnEditar">
                <i class="fa fa-edit"></i></a>
            <form method="POST" action="{{route('deleteCategoria', $categoria->idCategoria)}}">
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