<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!--        <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>-->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header" align="center">menú principal</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-map-o" aria-hidden="true"></i> <span>Zonas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('zonas.index') }}"><i class="fa fa-circle-o"></i> zonas registradas</a></li> 
                    <li><a href="{{ route('zonas.create') }}"><i class="fa fa-circle-o"></i> registrar una zona</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-road" aria-hidden="true"></i>
                    <span>Recorridos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('rutas.index') }}"><i class="fa fa-circle-o"></i> Recorridos del día</a></li>
                    <li><a href="{{ route('rutas.index') }}"><i class="fa fa-circle-o"></i> Histórico</a></li>
                </ul>
            </li>   
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                    <span>Generales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Celulares</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Preventistas</a></li>
                </ul>
            </li>  
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>