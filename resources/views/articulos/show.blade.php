<!DOCTYPE html>
<html lang="es">
<head>
    <title>RevistApp</title>
</head>
<body>
<h1>Revistapp</h1>
@if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
<h2>Detalle del artículo:</h2>
<ul>
    <li>Fecha de creación: {{ $articulo->created_at }}</li>
    <li>Fecha de última actualización: {{ $articulo->updated_at }}</li>
    <li>Titulo: {{ $articulo->titulo }}</li>
    <li>Contenido: {{ $articulo->contenido }}</li>
</ul>
<h3>Añadir comentario</h3>
@if (session('error')){
    <div class="alert-danger alert">{{session('error')}}</div>
@endif
<form method="POST" action="{{ route('comentarios.store', $articulo) }}">
    @csrf
    <div>
        <label>Contenido:</label>
    </div>
    <div>
        <textarea name="texto"></textarea>
    </div>
    <div>
        <button type="submit">Crear</button>
    </div>
</form>
<h3>Comentarios:</h3>
<ul>
    @foreach ($articulo->comentarios as $comentario)
        <li>
            <small>{{ $comentario->created_at }}</small>:
            <span>{{ $comentario->texto }}</span>
        </li>
    @endforeach
</ul>

<a href="{{ route('articulos.index') }}">Volver</a>
</body>
</html>
