@extends('admin.layout')

@section('header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Posts <small>Crear publicacion</small> </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{Route('admin.posts.index')}}">Posts</a></li>
          <li class="breadcrumb-item active">Crear</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@stop

@section('content')
<form method="POST" action="{{route('admin.posts.update',$post)}}" >
  {{ csrf_field() }} {{method_field('PUT')}}
<div class="row ">

    <div class="col-md-8">

        <div class="card ">
            <div class="card-body">
                    <div class="form-group {{$errors->has('title') ? 'alert-danger' : '' }}">
                      <label for="">Título de la publicación</label>
                      <input type="text"
                             name="title"
                             class="form-control"
                             value="{{old('title',$post->title)}}"
                             placeholder="Ingresa aqui el titulo de la publicación">
                      {!!$errors->first('title','<span class="help-block">:message</span>')!!}

                    </div>

                    <div class="form group {{$errors->has('body') ? 'alert-danger' : '' }}">
                      <label for="">Contenido de la publicación</label>
                      <textarea name="body" id="editor" rows="10" class="form-control" placeholder="Ingresa el contenido completo de la publicación">
                        {{old('body',$post->body)}}
                      </textarea>
                      {!!$errors->first('body','<span class="help-block">:message</span>')!!}
                    </div>



            </div>
        </div>

      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label>Fecha de publicación:</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input name="published_at"
                           id="datepicker"
                           type="text"
                           class="form-control datetimepicker-input"
                           value="{{old('published_at',$post->published_at ? $post->published_at->format('m/d/Y') : null ) }}"
                           data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group {{$errors->has('category') ? 'alert-danger' : '' }}">
                <label>Categorias</label>
                <select name="category" class="form-control">
                    <option value="">Seleccione una categoria</option>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}"
                          {{old('category',$post->category_id)==$category->id ? 'selected' : ''}}
                        >{{$category->name}}</option>
                    @endforeach
                </select>
                {!!$errors->first('category','<span class="help-block">:message</span>')!!}
            </div>
            <div class="form-group {{$errors->has('tags') ? 'alert-danger' : '' }}">
              <label for="">Etiquetas</label>
              <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;" >
                   @foreach ($tags as $tag )
                     <option {{collect(old('tags',$post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                            value="{{$tag->id}}"
                            >{{$tag->name}}
                    </option>
                   @endforeach
              </select>
              {!!$errors->first('tags','<span class="help-block">:message</span>')!!}
            </div>
            <div class="form group {{$errors->has('excerpt') ? 'alert-danger' : '' }}">
                  <label for="">Extracto de la publicación</label>
                  <textarea
                            name="excerpt"
                            class="form-control"
                            placeholder="Ingresa un extracto de la publicación"
                            >{{old('excerpt',$post->excerpt)}}
                  </textarea>
                  {!!$errors->first('excerpt','<span class="help-block">:message</span>')!!}
            </div>
            <div class="form-group">
                <div class="dropzone">

                </div>
            </div>
            <div class="form group">
                <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
            </div>
          </div>
        </div>
    </div>




</div>
</form>
@stop

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css">
 <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
  <!-- Summernote -->
  <script src="/adminlte/plugins/summernote/summernote-bs4.min.js" defer></script>

  <!-- date-range-picker -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
  <script>
    try{
            $(function () {
              $("#datepicker").datepicker();
            });

            $(function () {
            // Summernote
            $('#editor').summernote();


          });

          $('.select2').select2();

        var myDropzone=  new Dropzone('.dropzone',{
                url:'/admin/posts/{{ $post->url }}/photos',
                acceptedFiles: 'image/*',
                paramName: 'photo',
                maxFilesize: 2,
                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },
                dictDefaultMessage:'Arrastra las fotos aqui para subirlas'
          });

          myDropzone.on('error',function(file,res){
                var msg=res.errors.photo[0];
                $('.dz-error-message:last > span').text(msg);
          } )
          Dropzone.autoDiscover=false;
    }catch(e){
      console.log(e.message);
    }

  </script>
@endpush




<style>
  .borde{
    border: solid 1px;
  }
</style>

<!--
-->
