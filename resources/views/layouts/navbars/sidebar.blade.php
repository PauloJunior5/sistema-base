<div class="sidebar" data-color="orange" data-background-color="white">
    <?php
    try {
        $url = explode('/', Request::url())[3];
    } catch (Exception $e) {
        report($e);
        $url = '/home';
    }
    ?>
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
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="true">
                    <i class="material-icons">person</i>
                    <p>{{ __('Usuários') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ ($activePage == 'user-management' || $activePage == 'profile') ? ' show' : '' }}" id="usuarios">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal">{{ __('Perfil do Usuário') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <span class="sidebar-mini"> N </span>
                                <span class="sidebar-normal"> {{ __('Usuários') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="true">
                    <i class="material-icons">filter_hdr</i>
                    <p>{{ __('Território') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ ($activePage == 'pais-management' || $activePage == 'estado-management' ||
                $activePage == 'cidade-management') ? ' show' : '' }}" id="usuarios">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'pais-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('pais.index') }}">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal">{{ __('Países') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'estado-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('estado.index') }}">
                                <span class="sidebar-mini"> E </span>
                                <span class="sidebar-normal">{{ __('Estados') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'cidade-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('cidade.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Cidades') }} </span>
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
                <div class="collapse {{ ($activePage == 'cliente-management' || $activePage == 'fornecedor-management' ||
                                    $activePage == 'exame-management' || $activePage == 'paciente-management' ||
                                    $activePage == 'medico-management' || $activePage == 'fornecedor-management' ||
                                    $activePage == 'condicao-pagamento-management')
                                    ? ' show' : '' }}" id="cadastro">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'cliente-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('cliente.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Clientes') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'medico-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('medico.index') }}">
                                <span class="sidebar-mini"> M </span>
                                <span class="sidebar-normal">{{ __('Médicos') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'paciente-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('paciente.index') }}">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal">{{ __('Pacientes') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'exame-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('exame.index') }}">
                                <span class="sidebar-mini"> E </span>
                                <span class="sidebar-normal">{{ __('Exames') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'fornecedor-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('fornecedor.index') }}">
                                <span class="sidebar-mini"> L </span>
                                <span class="sidebar-normal">{{ __('Fornecedores') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'condicao-pagamento-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('condicaoPagamento.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Condições de pagamento') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
