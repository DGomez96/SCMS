<aside>
    <div id="sidebar" class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
          @if($URI == '/panelAdministrador/Productos/'.$spliteada[3].'/edit')
          <p class="centered"><a href="profile.php"><img src="{{asset('images/logo-admin.png')}}" class="img-circle" width="80"></a></p>

        @else
          <p class="centered"><a href="profile.php"><img src="{{asset('images/logo-admin.png')}}" class="img-circle" width="80"></a></p>
        @endif
        <h5 class="centered">{{$email}}</h5>
        @can('PanelA.index')
          <li class="mt">
            @if($URI == '/panelAdministrador')
              <a class="active" href="/panelAdministrador">
                <i class="fa fa-dashboard"></i>
                <span>Inicio</span>
              </a>
            @else
            <a href="/panelAdministrador">
                <i class="fa fa-dashboard"></i>
                <span>Inicio</span>
              </a>
            @endif
          </li>
        @endcan

        @can('PanelA.productos')
          <li class="sub-menu" >
          @if($URI == '/panelAdministrador/Productos' || $URI == '/panelAdministrador/Categorias' || $URI == '/panelAdministrador/Canon'  )
            <a class="active" href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Productos</span>
              </a>
              <ul class="sub">
                <li><a href="/panelAdministrador/Productos">Ver Productos</a></li>
                <li><a href="/panelAdministrador/Categorias">Categorias y Subcategorias</a></li>
                <li><a href="/panelAdministrador/Canon">Canones</a></li>


            </ul>
          @else
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Productos</span>
            </a>
              <ul class="sub">
                <li><a href="/panelAdministrador/Productos">Ver Productos</a></li>
                <li><a href="/panelAdministrador/Categorias">Categorias y Subcategorias</a></li>
                <li><a href="/panelAdministrador/Canon">Canones</a></li>

              </ul>

          @endif
          </li>
        @endcan

        @can('PanelA.clientes')
          <li class="sub-menu">
            @if($URI == '/panelAdministrador/Clientes')

              <a class="active" href="/panelAdministrador/Clientes">
                <i class="fa fa-user"></i>
                <span>Clientes</span>
                </a>
            @else
              <a href="/panelAdministrador/Clientes">
                  <i class="fa fa-user"></i>
                  <span>Clientes</span>
              </a>
            @endif
          </li>
        @endcan

        @can('PanelA.factura')
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Facturas</span>
              </a>
              <ul class="sub" style="display: block;">
                <li><a href="/panelAdministrador/Facturas">Añadir Factura</a></li>
                <li><a href="">Manejar Facturas</a></li>

              </ul>
          </li>
        @endcan

        @can('')
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-truck"></i>
              <span>Pedidos</span>
              </a>
          </li>
        @endcan

        @can('PanelA.chat')
          <li class="sub-menu">
          @if($URI == '/Chat')
              <a class="active" href="/panelAdministrador/Chat">
                <i class="fa fa-user"></i>
                <span>Chat</span>
                </a>
          @else
              <a href="/panelAdministrador/Chat">
                  <i class="fa fa-user"></i>
                  <span>Chat</span>
              </a>
          @endif
          </li>
        @endcan
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>