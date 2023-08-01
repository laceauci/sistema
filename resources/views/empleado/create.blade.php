@extends('adminlte::page')

@section('content')
<div class="container">

<form action="{{ url('/admin/empleado') }}" method="post" enctype="multipart/form-data">
@csrf
@include('empleado.form',['modo'=>'Crear']);

</form>

</div>
@endsection
