@extends('layouts.formModal')
@section('modal-body')
  <div class="form-group">
      <div class="form-group">
          {!! Form::label('Categoria','Categoria') !!}
          {!! Form::select('Categoria',[],null,['id'=>'cat','class' =>'form-control']) !!}
      </div>
      {!! Form::label('descripcion','Descripcion') !!}
      {!! Form::text('descripcion',null, ['id'=>'subcat','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
@endsection

<script type="text/javascript">

   var save = function(){
       var subcategoria = {
           id: $("#id").val(),
           descripcion:'',
           categoria_id: $("#cat option:selected").val()
       };

       subcategoria.id = subcategoria.id || 0;
       subcategoria.descripcion = $("#subcat").val();
       var route = "{{ route('SubCategoriaAddOrUpdate') }}";

       $.ajax({
           url: route,
           headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
           type: 'POST',
           dataType: 'json',
           data: {data: subcategoria},
           success: function(){
               $("#myModal").modal('toggle');
               ajaxLoad('{{ route('SubCategoriaIndex') }}');
           }
       });
   };

   var nuevoReg = function () {
       loadComboCategorias();
       $('#myModalLabel').html("Nueva SubCategoria");
       $('.form-group input[type=text]').val('');
   };

   var editar = function(id){
        loadComboCategorias();
        $('#myModalLabel').html('Editar #' + id);
        var route = "{{ route('SubCategoriaEdit',['id'=> 'IDENTITY']) }}";
        route =route.replace('IDENTITY',id);
        $.get(route, function(res){
            $("#subcat").val(res.data.descripcion);
            $("#id").val(res.data.id);
            $('#cat').val(res.data.categoria_id);
        });
   }

    var loadComboCategorias= function(){
        var routeCombo = "{{ route('CategoriasCombo') }}";
            $.get(routeCombo, function(response){
            var cat= $('#cat');
            cat.empty();
            for (var i = 0; i < response.data.length; i++) {
                cat.append('<option id=' + response.data[i].id + ' value=' + response.data[i].id + '>' + response.data[i].descripcion + '</option>');
            }
        });
    };

</script>

