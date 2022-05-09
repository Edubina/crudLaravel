<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
     <script src="https://kit.fontawesome.com/0f345afacb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Libros</title>

    <style>
        .header{
            
        }
    </style>

</head>

<body>
    <div>
        <div class="header">
            <div>
                <h1>Libros</h1>
            </div>
        
        </div>
        <table class="table">
            <thead> 
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Resumen</th>
                    <th scope="col">Número Pagina</th>
                    <th scope="col">Edición</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Precio</th>
                    <th scope="col"><button class="btn btn-primary" onclick="modalAgregar()">Agregar</button></th>
                </tr>
            </thead>
            <tbody id="tabla">

            </tbody>
        </table>
    </div>

    @include('modalCrearL')
    @include('editar')
    <script>
        route = "{{ route('libros.show', ':id') }}";

        function obtenerDatos() {
            fetch(route)
                .then(response => response.json())
                .then(data => {
                    cargarTabla(data)
                })
        }

        function cargarTabla(libros) {

            tabla = libros.map((libro) => {
                return `<tr>
                    <td>${libro.id}</td>
                    <td>${libro.nombre}</td>
                    <td>${libro.resumen}</td>
                    <td>${libro.noPaginas}</td>
                    <td>${libro.edicion}</td>
                    <td>${libro.autor}</td>
                    <td>${libro.precio}</td>
                    <td><button class="btn btn-primary" onclick="modalEditar(${libro.id},'${libro.nombre}','${libro.resumen}',${libro.noPaginas},'${libro.edicion}', '${libro.autor}', ${libro.precio})"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-danger" onclick="eliminar(${libro.id})"><i class="fa-solid fa-trash"></i></button></td>
                    <tr>`
            })
            document.getElementById('tabla').innerHTML = tabla.join('');
        }

        obtenerDatos()


        function modalAgregar() {
            $('#modalCrearL').modal('show');
        }
        function modalEditar(id,nombre,resumen,noPaginas,edicion,autor,precio) {
            console.log(id,nombre,resumen,noPaginas,edicion,autor,precio);
            $('#id').val(id);
            $('#nombreE').val(nombre);
            $('#resumenE').val(resumen);
            $('#noPaginasE').val(noPaginas);
            $('#edicionE').val(edicion);
            $('#autorE').val(autor);
            $('#precioE').val(precio);
            $('#modalEditar').modal('show');
        }

        function eliminar(id) {
            route = "{{ route('libros.destroy', ':id') }}";
            route = (route.replace(':id', id));
            fetch(route, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    obtenerDatos(data)
                })
        }
    </script>
</body>

</html>
