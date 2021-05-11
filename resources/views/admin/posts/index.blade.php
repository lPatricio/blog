@extends('admin.layout')

@section('header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Listado</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Inicio</a></li>
          <li class="breadcrumb-item active">Posts</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@stop
@section('content')
<div class="card ">
  <div class="card-header">
    <h3 class="card-title">Listado de publicaciones</h3>
    <button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#modal"><i class="fas fa-plus"></i> Crear publicación</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="posts-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Extracto</th>
        <th>Acciones</th>
       </tr>
      </thead>
      <tbody>
          @foreach($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->excerpt}}</td>
              <td>
                <a href="{{ route('posts.show',$post) }}"
                   class="btn btn-xs btn-info"
                   target="_blank"
                   >

                   <i class="fas fa-eye"></i></a>
                  <a href="{{route('admin.posts.edit',$post)}}" class="btn btn-xs btn-info"><i class="fas fa-pen"></i></a>
                  <a href="#" class="btn btn-xs btn-danger"><i class="fas fa-times"></i></a>
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@stop


@push('styles')
  <!-- daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
<!-- DataTables  & Plugins -->
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
          $('#posts-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });

    </script>


@endpush
