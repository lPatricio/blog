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
<div class="row">
  <form action="">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-body">
              <div class="form group">
                <label for="">Título de la publicación</label>
                <input type="text" name="title" class="form-control" placeholder="Ingresa aqui el titulo de la publicación">
              </div>
              
              <div class="form group">
                <label for="">Contenido de la publicación</label>
                <textarea name="body" rows="10" class="form-control" placeholder="Ingresa el contenido completo de la publicación"></textarea>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
          <div class="card-body">
          
              <div class="form group">
                  <label for="">Extracto de la publicación</label>
                  <textarea name="excerpt"  class="form-control" placeholder="Ingresa un extracto de la publicación"></textarea>
              </div>
          </div>
        </div>
    </div>
  </form>
</div>
 
@stop