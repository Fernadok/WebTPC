<div class="modal fade"
     id="myModal"
     role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Titulo</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                @yield('modal-body')
            </div>
            <div class="modal-footer">
                @yield('modal-footer')
                {!! link_to('#', $title='Guardar', $attributes = ['onClick'=>'save()', 'id'=>'save', 'class'=>'btn btn-primary'], $secure = null)!!}
            </div>
        </div>
    </div>
</div>