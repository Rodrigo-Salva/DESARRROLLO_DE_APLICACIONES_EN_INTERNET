@extends('layouts.layout')
@section('contenido')
<a href="{{ route('productos.create') }}">Agregar Producto</a>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Marca</th>
<th>Precio</th>
<th>Stock</th>
<th>Categoria</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
@foreach ($productos as $item)
<tr>
Desarrollo de Aplicaciones en Internet – Laravel Laboratorio 11
Página 5 de 8
<td>{{ $item->nombre }}</td>
<td>{{ $item->marca }}</td>
<td>{{ $item->precio }}</td>
<td>{{ $item->stock }}</td>
<td>{{ $item->categoria->descripcion }}</td>
<td>
<a href="{{route('productos.show', ['producto'=>$item->id_producto])}}">
Detalle</a>
</td>
<td>
<a href="{{route('productos.edit', ['producto'=>$item->id_producto])}}">
Editar</a>
</td>
<td>
<form action="{{route('productos.destroy',
['producto'=>$item->id_producto])}}"
method="POST">
@csrf
@method('DELETE')
<button type="submit">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
{{ $productos->links() }}
@endsection