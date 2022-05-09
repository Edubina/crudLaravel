const libros = [
    { id: 1, nombre: 'Libro 1', resumen: 'resumen', noPagina: 10,edicion: 'editorial', autor: 'genero', precio: 'imagen' },
    { id: 2, nombre: 'Libro 2', resumen: 'resumen', noPagina: 10,edicion: 'editorial', autor: 'genero', precio: 'imagen' },
    { id: 3, nombre: 'Libro 3', resumen: 'resumen', noPagina: 10,edicion: 'editorial', autor: 'genero', precio: 'imagen' },
    { id: 4, nombre: 'Libro 4', resumen: 'resumen', noPagina: 10,edicion: 'editorial', autor: 'genero', precio: 'imagen' },
    { id: 5, nombre: 'Libro 5', resumen: 'resumen', noPagina: 10,edicion: 'editorial', autor: 'genero', precio: 'imagen' },
]

function cargarTabla(libros){
    tabla = libros.map((libro) => {
        return `<tr>
                    <td>${libro.id}</td>
                    <td>${libro.nombre}</td>
                    <td>${libro.resumen}</td>
                    <td>${libro.noPagina}</td>
                    <td>${libro.edicion}</td>
                    <td>${libro.autor}</td>
                    <td>${libro.precio}</td>
                    <tr>`
    })
    document.getElementById('tabla').innerHTML = tabla.join('');    

}

cargarTabla(libros);