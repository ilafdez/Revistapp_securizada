<html>
<head>
    <title>RevistApp</title>
</head>
<body>
<h1>Revistapp</h1>
<h2>Editar un artículo:</h2>

<form method="POST" action="{{ route('articulos.update',[$articulo->id]) }}">
    @csrf
    @method("PUT")
    <p><label>Titulo: </label><input type="text" name="titulo" value="{{ $articulo->titulo}}"></p>
    <p><label>Contenido: </label><input type="text" name="contenido" value="{{ $articulo->contenido}}"></input></p>
    <button type="submit">Modificar</button>
</form>
<a href="{{ route('articulos.index') }}">Volver</a>
</body>
</html>
