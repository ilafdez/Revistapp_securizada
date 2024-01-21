<html>
<head>
    <title>RevistApp</title>
</head>
<body>
<h1>Revistapp</h1>
<h2>Listado artículos:</h2>
@if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
<table>
    <tr><th>Enlace</th><th>Título</th><th>Contenido</th><th></th><th></th></tr>
    @foreach ($articulos as $articulo)
        <tr>
            <td><a href="{{ route('articulos.show', $articulo['id']) }}">Ver</a></td>
            <td>{{ ($articulo['titulo']) }}</td>
            <td>{{ ($articulo['contenido']) }}</td>
            <td>
                <form method ="POST" action="{{ route('articulos.delete',$articulo->id) }}">
                    @csrf
                    @method("DELETE")
                    <button type ="submit">Eliminar</button>
                </form>
            </td>
            <td><a href="{{ route('articulos.edit', $articulo['id']) }}" >Editar</a></td>
        </tr>
        @endforeach
        </ul>
</body>
</html>
