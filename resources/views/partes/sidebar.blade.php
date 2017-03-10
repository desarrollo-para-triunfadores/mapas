<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header" align="center">menú principal</li>
            <li id="side-zonas" class="treeview">
                <a href="#">
                    <i class="fa fa-map-o" aria-hidden="true"></i> <span>Zonas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-elem-zonas-registradas"><a href="{{ route('zonas.index') }}"><i class="fa fa-circle-o"></i> zonas registradas</a></li> 
                    <li id="side-elem-registrar-zona"><a href="{{ route('zonas.create') }}"><i class="fa fa-circle-o"></i> registrar una zona</a></li>
                </ul>
            </li>
            <li id="side-recorridos" class="treeview">
                <a href="#">
                    <i class="fa fa-road" aria-hidden="true"></i>
                    <span>Recorridos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-elem-recorridos-dia"><a href="{{ route('rutas.index') }}"><i class="fa fa-circle-o"></i> Recorridos del día</a></li>
                    <li id="side-elem-recorridos-historico"><a href="{{ route('rutas.index') }}"><i class="fa fa-circle-o"></i> Histórico</a></li>
                </ul>
            </li>   
            <li id="side-general" class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                    <span>Generales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-ele-usuarios"><a href="{{ route('usuarios.index') }}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <li id="side-ele-celulares"><a href="{{ route('celulares.index') }}"><i class="fa fa-circle-o"></i> Celulares</a></li>
                    <li id="side-ele-preventistas"><a href="{{ route('preventistas.index') }}"><i class="fa fa-circle-o"></i> Preventistas</a></li>
                </ul>
            </li>  
        </ul>
    </section>
</aside>