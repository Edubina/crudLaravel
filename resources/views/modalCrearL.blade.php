<style media="screen">
    .modal-slide-in-right .modal-dialog{
      width: 70%;
    }
  </style>
  
<div class="modal fade modal-slide-in-center" aria-hidden="true" role="document" tabindex= "-1" id="modalCrearL">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Libro</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('libros.store')}}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del libro">
                    </div>
                    <div class="form-group">
                        <label for="resumen">Resumen</label>
                        <input type="text" name="resumen" id="resumen" class="form-control" placeholder="Resumen del libro">
                        </div>
                    <div class="form-group">
                        <label for="noPagina">Número de páginas</label>
                        <input type="number" name="noPagina" id="noPagina" class="form-control" placeholder="Número de páginas">
                    </div>
                    <div class="form-group">
                        <label for="edicion">Edición</label>
                        <input type="text" name="edicion" id="edicion" class="form-control" placeholder="Edición del libro">
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control" placeholder="Autor del libro">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio del libro">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrar()">Cerrar</button>
                <button type="submit" class="btn btn-primary" onclick="guardar()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function cerrar(){
        $('#modalCrearL').modal('hide');
    }
    function guardar(){
        route = "{{route('libros.store')}}";

        $.ajax({
            url: route,
            type: 'POST',
            data: {
                nombre: $('#nombre').val(),
                resumen: $('#resumen').val(),
                noPaginas: $('#noPagina').val(),
                edicion: $('#edicion').val(),
                autor: $('#autor').val(),
                precio: $('#precio').val(),
            },
            success: function(data){
                reload();
            }
        });
    }
    function reload(){
        location.reload();
    }
</script>