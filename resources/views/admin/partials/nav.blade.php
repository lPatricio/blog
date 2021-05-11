  <!--<ul class="sidebar-menu">
       <li class="header">Navegación</li>
       <li class="active"><a ref="#"><i class="fa fa-link"></i><span>Another link</span></a></li>
       <li class="treenview">
           <a href="#"><i class="fa fa-link"></i><span>Multilevel</span>
                   <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> 
           </a>
           <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
           </ul>
       </li>
  </ul>-->
  
  
  <!-- Sidebar Menu -->
   <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <!--<i class="nav-icon fas fa-tachometer-alt"></i>-->
              <i class="nav-icon fas fa-align-justify"></i>
              <p>
                Navegación
                <i class="right fas fa-angle-left"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('dashboard')}}" 
                   class="nav-link  {{request()->is('admin') ? 'active': '' }}"
                >
                <!--  <i class="far fa-circle nav-icon"></i>-->
                  <i class=" fas fa-home"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.posts.index')}}" class="nav-link {{request()->is('admin/posts') ? 'active': '' }}">
                  <i class="fas fa-book-reader nav-icon"></i>
                  <p>Ver todos los posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" data-toggle="modal" data-target="#modal" class="nav-link ">
                  <i class="fas fa-pencil-alt nav-icon"></i>
                  <p>Crear un post</p>
                </a>
              </li>
            </ul>
          </li>
        <!--  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->
        </ul>
    </nav>
     <!-- /.sidebar-menu -->