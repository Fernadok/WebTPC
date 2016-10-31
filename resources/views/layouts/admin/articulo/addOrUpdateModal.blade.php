@extends('layouts.formModal')
@section('modal-body')
  <div class="form-group">
     <div class="row">
         <div class="col-md-12">
             {!! Form::label('subcategoria_id','SubCategoria') !!}
             {!! Form::select('subcategoria_id',[],null,['id'=>'subcat','class' =>'form-control']) !!}
         </div>
         <div class="col-md-12">
            {!! Form::label('descripcion','Descripcion') !!}
            {!! Form::text('descripcion',null, ['id'=>'descripcion','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-12">
             {!! Form::label('detalle','Detalle') !!}
             {!! Form::text('detalle',null, ['id'=>'detalle','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-12">
             {!! Form::label('detalle_largo','Detalle Largo') !!}
             {{ Form::textarea('detalle_largo', null , array('class' => 'span12 form-control', 'placeholder' => '', 'rows' => '3', 'value' => '' ))}}
         </div>
         <div class="col-md-6">
             {!! Form::label('precio_costo','Precio Costo') !!}
             {!! Form::text('precio_costo',null, ['id'=>'precio_costo','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-6">
             {!! Form::label('precio_venta','Precio Venta') !!}
             {!! Form::text('precio_venta',null, ['id'=>'precio_venta','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-4">
             {!! Form::label('stock','Stock') !!}
             {!! Form::text('stock',null, ['id'=>'stock','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-4">
             {!! Form::label('estado_stock','Estado Stock') !!}
             {!! Form::select('estado_stock',['Alto'=>'Alto', 'Medio'=>'Medio', 'Bajo'=>'Bajo'],null,['id'=>'estado_stock','class' =>'form-control']) !!}
         </div>
         <div class="col-md-4">
             {!! Form::label('venta_minima','Venta Minima') !!}
             {!! Form::text('venta_minima',null, ['id'=>'venta_minima','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-6">
             {!! Form::label('precio_mayorista','Precio Mayorista') !!}
             {!! Form::text('precio_mayorista',null, ['id'=>'precio_mayorista','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-6">
             {!! Form::label('precio_tecnico','Precio Tecnico') !!}
             {!! Form::text('precio_tecnico',null, ['id'=>'precio_tecnico','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-6">
             {!! Form::label('porcentaje','Porcentaje') !!}
             {!! Form::text('porcentaje',null, ['id'=>'porcentaje','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
         <div class="col-md-6">
             {!! Form::label('ganancia','Ganancia') !!}
             {!! Form::text('ganancia',null, ['id'=>'ganancia','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
         </div>
     </div>
  </div>
@endsection

<script type="text/javascript">

   var save = function(){
       var articulo = {
           id: $("#id").val(),
           subcategoria_id:$("#subcat option:selected").val(),
           descripcion:$("#descripcion").val(),
           detalle:$("#detalle").val(),
           detalle_largo:$("#detalle_largo").val(),
           precio_costo:$("#precio_costo").val(),
           precio_venta:$("#precio_venta").val(),
           stock:$("#stock").val(),
           estado_stock:$("#estado_stock").val(),
           venta_minima:$("#venta_minima").val(),
           precio_mayorista:$("#precio_mayorista").val(),
           precio_tecnico:$("#precio_tecnico").val(),
           porcentaje:$("#porcentaje").val(),
           ganancia:$("#ganancia").val()
       };
       articulo.id = articulo.id || 0;

       var route = "{{ route('ArticuloAddOrUpdate') }}";
       var token = "{{ csrf_token() }}";

       $.ajax({
           url: route,
           headers: {'X-CSRF-TOKEN': token},
           type: 'POST',
           dataType: 'json',
           data: {data: articulo},
           success: function(){
               $("#myModal").modal('toggle');
               ajaxLoad('{{ route('ArticuloIndex') }}');
           }
       });
   };

   var nuevoReg = function () {
       loadComboSubCategorias();
       $('#myModalLabel').html("Nueva Categoria");
       $('.form-group input[type=text]').val('');
   };

   var editar = function(id){
       loadComboSubCategorias();
        $('#myModalLabel').html('Editar #' + id);
        var route = "{{ route('ArticuloEdit',['id'=> 'IDENTITY']) }}";
        route =route.replace('IDENTITY',id);
        $.get(route, function(res){
            $("#subcat").val(res.data.subcategoria_id);
            $("#descripcion").val(res.data.descripcion);
            $("#detalle").val(res.data.detalle);
            $("#detalle_largo").val(res.data.detalle_largo);
            $("#precio_costo").val(res.data.precio_costo);
            $("#precio_venta").val(res.data.precio_venta);
            $("#stock").val(res.data.stock);
            $("#estado_stock").val(res.data.estado_stock);
            $("#venta_minima").val(res.data.venta_minima);
            $("#precio_mayorista").val(res.data.precio_mayorista);
            $("#precio_tecnico").val(res.data.precio_tecnico);
            $("#porcentaje").val(res.data.porcentaje);
            $("#ganancia").val(res.data.ganancia);
            $("#id").val(res.data.id);
        });
   }

   var loadComboSubCategorias= function(){
       var routeCombo = "{{ route('SubCategoriasCombo') }}";
       $.get(routeCombo, function(response){
           var cat= $('#subcat');
           cat.empty();
           for (var i = 0; i < response.data.length; i++) {
               cat.append('<option id=' + response.data[i].id + ' value=' + response.data[i].id + '>' + response.data[i].descripcion + '</option>');
           }
       });
   };
</script>

