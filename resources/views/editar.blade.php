<style media="screen">
    .modal-slide-in-right .modal-dialog{
      width: 70%;
    }
  </style>

  <div class="modal fade modal-slide-in-center" aria-hidden="true" role="document" tabindex= "-1" id="modalEditar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Libro</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('libros.store')}}" method="GET">
                        @csrf  
                        <div class="form-group">
                            <input type="number" name="id" id="id" class="form-control" style="display: none">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombreE" class="form-control" placeholder="Nombre del libro">
                        </div>
                        <div class="form-group">
                            <label for="resumen">Resumen</label>
                            <input type="text" name="resumen" id="resumenE" class="form-control" placeholder="Resumen del libro">
                            </div>
                        <div class="form-group">
                            <label for="noPaginas">Número de páginas</label>
                            <input type="number" name="noPaginas" id="noPaginasE" class="form-control" placeholder="Número de páginas">
                        </div>
                        <div class="form-group">
                            <label for="edicion">Edición</label>
                            <input type="text" name="edicion" id="edicionE" class="form-control" placeholder="Edición del libro">
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input type="text" name="autor" id="autorE" class="form-control" placeholder="Autor del libro">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" name="precio" id="precioE" class="form-control" placeholder="Precio del libro">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarEd()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="guardarEd()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>        
        function cerrarEd(){
            $('#modalEditar').modal('hide');
        }

        function guardarEd(){
            route = "{{route('libros.update', ':id')}}";
            route = (route.replace(':id', $('#id').val()));
        $.ajax({
            url: route,
            type: 'PATCH',
            data: {
                nombre: $('#nombreE').val(),
                resumen: $('#resumenE').val(),
                noPaginas: $('#noPaginasE').val(),
                edicion: $('#edicionE').val(),
                autor: $('#autorE').val(),
                precio: $('#precioE').val(),
            },
            success: function(data){
                reload();
            }
        });
    }

    </script>