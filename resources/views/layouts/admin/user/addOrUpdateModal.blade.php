@extends('layouts.formModal')
@section('modal-body')
  <div class="form-group">
      {!! Form::label('name','Apellido y Nombre') !!}
      {!! Form::text('name',null, ['id'=>'name','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
  <div class="form-group">
      {!! Form::label('email','Correo') !!}
      {!! Form::text('email',null, ['id'=>'email','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
  <div class="form-group">
      {!! Form::label('password','Password') !!}
      {!! Form::text('password',null, ['id'=>'password','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
  <div class="form-group">
      {!! Form::label('telefono','Telefono') !!}
      {!! Form::text('telefono',null, ['id'=>'telefono','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
  <div class="form-group">
      {!! Form::label('empresa','Empresa') !!}
      {!! Form::text('empresa',null, ['id'=>'empresa','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
  <div class="form-group">
      {!! Form::label('direccion','Direccion') !!}
      {!! Form::text('direccion',null, ['id'=>'direccion','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
@endsection

<script type="text/javascript">

   var save = function(){
       var user = {
           id: $("#id").val(),
           name:$("#name").val(),
           email:$("#email").val(),
           password:$("#password").val(),
           telefono:$("#telefono").val(),
           direccion:$("#direccion").val(),
           empresa:$("#empresa").val(),
           isActive:true
       };
       user.id = user.id || 0;

       var route = "{{ route('UserAddOrUpdate') }}";
       var token = "{{ csrf_token() }}";

       $.ajax({
           url: route,
           headers: {'X-CSRF-TOKEN': token},
           type: 'POST',
           dataType: 'json',
           data: {data: user},
           success: function(){
               $("#myModal").modal('toggle');
               ajaxLoad('{{ route('UserIndex') }}');
           }
       });
   };

   var nuevoReg = function () {
       $('#myModalLabel').html("Nuevo Usuario");
       $('.form-group input[type=text]').val('');
   };

   var editar = function(id){
        $('#myModalLabel').html('Editar #' + id);
        var route = "{{ route('UserEdit',['id'=> 'IDENTITY']) }}";
        route =route.replace('IDENTITY',id);
        $.get(route, function(res){
            $("#name").val(res.data.name);
            $("#email").val(res.data.email);
            $("#password").val(res.data.password);
            $("#telefono").val(res.data.telefono);
            $("#direccion").val(res.data.direccion);
            $("#empresa").val(res.data.empresa);
            $("#id").val(res.data.id);
        });
   }

</script>

