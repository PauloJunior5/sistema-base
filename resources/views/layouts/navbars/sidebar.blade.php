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
            <img src="{{ asset('material') }}/img/favicon.png" alt="" style="height: 30px;">
            <h3>Sistema Base 2.1</h3>
            <h6>Saúde Ocupacional</h6>
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
                <a class="nav-link" data-toggle="collapse" href="#regioes" aria-expanded="true">
                    <i class="material-icons">filter_hdr</i>
                    <p>{{ __('Regiões') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ ($activePage == 'pais-management' || $activePage == 'estado-management' ||
                $activePage == 'cidade-management') ? ' show' : '' }}" id="regioes">
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
                <a class="nav-link" data-toggle="collapse" href="#equipe" aria-expanded="true">
                    <i class="material-icons">work</i>
                    <p>{{ __('Equipe') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ ($activePage == 'fornecedor-management' || $activePage == 'medico-management') ? ' show' : '' }}" id="equipe">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'fornecedor-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('fornecedor.index') }}">
                                <span class="sidebar-mini"> F </span>
                                <span class="sidebar-normal">{{ __('Fornecedores') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'medico-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('medico.index') }}">
                                <span class="sidebar-mini"> M </span>
                                <span class="sidebar-normal">{{ __('Médicos') }} </span>
                            </a>
                        </li>
                    <ul class="nav">
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#geral" aria-expanded="true">
                    <i class="material-icons">label_important</i>
                    <p>{{ __('Geral') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ ($activePage == 'cliente-management' || $activePage == 'exame-management' ||
                                        $activePage == 'paciente-management' || $activePage == 'categoria-management' ||
                                        $activePage == 'exame-management') || $activePage == 'plano-management'
                                        ? ' show' : '' }}" id="geral">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'cliente-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('cliente.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Clientes') }} </span>
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
                        <li class="nav-item {{ $activePage == 'categoria-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('categoria.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Categorias') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'plano-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('plano.index') }}">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal">{{ __('Planos') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#contratos" aria-expanded="true">
                    <i class="material-icons">work</i>
                    <p>{{ __('Negócio') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ ($activePage == 'contrato-management' || $activePage == 'condicao-pagamento-management' ||
                                        $activePage == 'forma-pagamento-management') || $activePage == 'contas-receber-management'
                                        ? ' show' : '' }}" id="contratos">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'contrato-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('contrato.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Contratos') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'condicao-pagamento-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('condicaoPagamento.index') }}">
                                <span class="sidebar-mini"> CP </span>
                                <span class="sidebar-normal">{{ __('Condições de pagamento') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'forma-pagamento-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('formaPagamento.index') }}">
                                <span class="sidebar-mini"> FP </span>
                                <span class="sidebar-normal">{{ __('Formas de pagamento') }} </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'contas-receber-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('contaReceber.index') }}">
                                <span class="sidebar-mini"> CR </span>
                                <span class="sidebar-normal">{{ __('Contas a Receber') }} </span>
                            </a>
                        </li>
                    <ul class="nav">
                </div>
            </li>
        </ul>
    </div>
</div>