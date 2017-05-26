@extends('layouts.app')


@section('menu')




<li><a class="ajax-link" href="{{url()}}/inicio">
	<i class="glyphicon glyphicon-home"></i>
	<span> Inicio</span></a>
</li>



<li>
	<a class="ajax-link" href="{{url()}}/referido/create">
		<i class="glyphicon glyphicon-user"></i>
		<span>Ingresar</span>
	</a>
</li>

<li>
	<a class="ajax-link" href="{{url()}}/entrenamiento/create">
		<i class="glyphicon glyphicon-pencil"></i>
		<span>Actualizar</span>
	</a>
</li>

<li>
	<a class="ajax-link" href="{{url()}}/pdf">
		<i class="glyphicon glyphicon-list-alt"></i>
		<span>Rutero</span>
	</a>
</li>
<li>
	<a class="ajax-link" href="{{url()}}/entrenamiento/create">
		<i class="glyphicon glyphicon-log-out"></i>
		<span>Salir</span>
	</a>
</li>

@endsection
