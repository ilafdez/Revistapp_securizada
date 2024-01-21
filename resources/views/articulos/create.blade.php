<html>
<head>
    <title>RevistApp</title>
</head>
<body>
<h1>Revistapp</h1>
<h2>Crear un artículo:</h2>
@if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('articulos.store') }}">
    @csrf
    <p><label>Titulo: </label><input type="text" name="titulo" class="@error('titulo') is-invalid @enderror" value="{{ old('titulo') }}"></p>
    <p><label>Contenido: </label>
        <input type="text" name="contenido" class="@error('contenido')  is-invalid @enderror" value="{{ old('contenido') }}" >
        @error('contenido')

        <span class="text-danger">{{ $message }}</span>

        @endif
    </p>
    <button type="submit">Crear</button>
</form>
<a href="{{ route('articulos.index') }}">Volver</a>
</body>
</html>
