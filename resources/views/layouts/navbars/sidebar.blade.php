<div class="sidebar" data-color="orange" data-background-color="white" >
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <?php $url = explode('/', Request::url())[3]; ?>
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ __('Sistema Base') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">insert_chart_outlined</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="true">
          <i class="material-icons">person</i>
          <p>{{ __('Usuários') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse <?= ($url == 'user' || $url == 'profile') ? 'show' : '' ?>" id="usuarios">
          <ul class="nav">
            <li class="nav-item{">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal">{{ __('Perfil do Usuário') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> N </span>
                <span class="sidebar-normal"> {{ __('Usuários') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#cadastro" aria-expanded="true">
          <i class="material-icons">reorder</i>
          <p>{{ __('Cadastro') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse <?= ($url == 'pais' || $url == 'estado' || $url == 'cidade') ? 'show' : '' ?>" id="cadastro">
          <ul class="nav">
           
              <li class="nav-item">
                <a class="nav-link" href="{{ route('pais.index') }}">
                  <span class="sidebar-mini"> P </span>
                  <span class="sidebar-normal">{{ __('Países') }} </span>
                </a>
              </li>
      
              <li class="nav-item">
                <a class="nav-link" href="{{ route('estado.index') }}">
                  <span class="sidebar-mini"> E </span>
                  <span class="sidebar-normal">{{ __('Estados') }} </span>
                </a>
              </li>
        
        
              <li class="nav-item">
                <a class="nav-link" href="{{ route('cidade.index') }}">
                  <span class="sidebar-mini"> C </span>
                  <span class="sidebar-normal">{{ __('Cidades') }} </span>
                </a>
              </li>

          </ul>
        </div>
      </li>


    </ul>
  </div>
</div>