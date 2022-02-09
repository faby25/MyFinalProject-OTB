<aside id="sidebar" class="active main-sidebar sidebar-white sidebar-light elevation-4">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="brand-link">
        <x-application-logo class="brand-image img-circle elevation-3" style="opacity:.8" id="2" />
        <span class="logo brand-text font-weight-light ">
            <b>{{ Auth::user()->name}}</b>
        </span>
    </x-nav-link>
    <ul class="pt-3 nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">
        @if (Auth::user()->hasAnyRole('SuperAdmin','Admin', 'Cajero','Lecturador'))
        <li class="nav-item has-treeview ">
            <a class="nav-link  " href="dashboard">
                <i class="fas fa-fw fa-share "></i>
                <p>NOTIFICACIONES<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a class="nav-link  " href="posts.socios">
                        <i class="far fa-fw fa-circle "></i>
                        <p>Buzon sin atender</p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview ">
                    <a class="nav-link  " href="">
                        <i class="far fa-fw fa-circle "></i>
                        <p>Lista de pagos<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link  " href="/reclamos"><i class="far fa-fw fa-circle "></i>
                                <p>por pagar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="#">
                                <i class="far fa-fw fa-circle "></i>
                                <p>retrasos/multas</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link  " href="dashboard"><?php // TODO:  ?>
                <i class="far fa-fw fa-bell"></i>
                <p>NOTIFICACIONES<span class="badge badge-success right"></span></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a class="nav-link  " href="notices.recibo">
                        <i class="far fa-fw fa-circle "></i>
                        <p>Ver Recibos Pendientes</p>
                    </a>
                </li>
                <li class="nav-item has-treeview ">
                    <a class="nav-link  " href="multas">
                        <i class="far fa-fw fa-circle "></i>
                        <p>Ver multas<i class="fas fa-angle-left right"></i></p>
                    </a>
                </li>
            </ul>

        </li>
        @endif
        {{-- <li class="nav-header ">CONFIGURACIONES</li>
        <li class="nav-item">
            <a class="nav-link  " href="user.show">
                <i class="fas fa-fw fa-user fa fa-user "></i>
                <p>Perfil</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  " href="contraseña.edit.{{Auth::user()->id}}">
                <i class="fas fa-fw fa-lock "></i>
                <p>Cambiar Contraseña</p>
            </a>
        </li> --}}

        <li class="nav-header ">OPCIONES</li>
        <li @can('user.index')
        class="nav-item ">
        <a class="nav-link  " href="user"><i class="fas fa-fw fa-users"></i>
            <p>Lista de Socios</p>
        </a>
        @endcan
        </li>

        <li class="nav-item has-treeview">
            <a class="nav-link  " href=""><?php // TODO:  ?>
                <i class="fa fa-circle-dollar-to-slotl"></i>
                <p>TARIFAS<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link  " href="tconsumo">
                      <i class="fa fa-circle-dollar-to-slot"></i>
                      <p>Tarifas consumos</p>
                  </a>
                </li>
                <li class="nav-item has-treeview ">
                  <a class="nav-link  " href="tmulta">
                      <i class="fa fa-circle-dollar-to-slot"></i>
                      <p>Tarifas Multa</p>
                  </a>
                </li>
                <li class="nav-item has-treeview ">
                  <a class="nav-link  " href="taporte">
                      <i class="fa fa-circle-dollar-to-slot"></i>
                      <p>Tarifas Aportes</p>
                  </a>
                </li>
            </ul>

        </li>

        <li @can('lectura.index')
        class="nav-item">
        <a class="nav-link  " href="notices.edit">
            <i class="fas fa-fw fa-glasses"></i>
            <p>Registrar Lectura</p>
        </a>
        @endcan
        </li>
        <li @can('caja.index')
        class="nav-item">
        <a class="nav-link  " href="user.index">
            <i class="fas fa-fw fa-cash-register"></i>
            {{-- <i class="fas fa-fw fa-dollar-sign"></i> --}}
            <p>Registrar Pago</p>
        </a>
        @endcan
        </li>
        <li @can('user.index')
        class="nav-item">
        <a class="nav-link  " href="mreunion">
            <i class="fas fa-fw fa-highlighter"></i>
            <p>Control de Asistencia</p>
        </a>
        @endcan
        </li>

        @if (Auth::user()->hasAnyRole('SuperAdmin','Admin', 'Cajero','Lecturador'))
        <li class="nav-item">
            <a class="nav-link  " href="posts">
                <i class="fa fa-envelope"></i>
                <p>Mis Posts de la Pagina Principal</p>
            </a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link  " href="posts">
                <i class="fa fa-envelope"></i>
                <p>Buzon de reclamos y Sugerencias</p>
            </a>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link  " href="posts.socios">
                <i class="fa fa-envelope "></i>
                <p>Buzon de Reclamos y Sugerencias de Socios</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  " href="notices">
                <i class="fa fa-envelope"></i>
                <p>Recibos de agua</p>
            </a>
        </li>

        {{-- <li @can('reporte.index')
        class="nav-item">
        <a class="nav-link  " href="reporte">
            <i class="fas fa-fw fa-bug"></i>
            <p>Reportes</p>
        </a>
        @endcan
        </li> --}}
    </ul>
</aside>
