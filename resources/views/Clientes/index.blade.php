<h1>Lista de Clientes</h1>

@foreach($clientes as $cliente)
    <p>{{ $cliente->nombres }}</p>
@endforeach