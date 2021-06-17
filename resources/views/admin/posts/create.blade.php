<!--MODAL-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('admin.posts.store','#create')}}" >
    {{ csrf_field() }}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega el título de tu nueva publicación</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group {{$errors->has('title') ? 'alert-danger' : '' }}">
          <!--<label for="">Título de la publicación</label>-->
          <input type="text"
                 id="post-title"
                 name="title"
                 class="form-control"
                 value="{{old('title')}}"
                 placeholder="Ingresa aqui el titulo de la publicación" autofocus required>
          {!!$errors->first('title','<span class="help-block">:message</span>')!!}

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button  class="btn btn-primary">Crear publicación</button>
      </div>
    </div>
  </div>
  </form>
</div>

@push('scripts')
<script>
    if (window.location.hash==='#create'){
        $('#modal').modal('show');
    }
    $('#modal').on('hide.bs.modal',function(){
        window.location.hash='#';
    });

    $('#modal').on('shown.bs.modal',function(){
        $('#post-title').focus();
        window.location.hash='#create';
    });
</script>
@endpush
