@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
	<!-- background-image: url('{{ asset('material') }}/img/login.jpg'); -->
  <div class="page-header login-page header-filter" filter-color="black" style="background-size: cover; background-position: top center; background-image: url('{{ asset('material') }}/img/nova01.jpg');" align-items: center; data-color="purple">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
    @include('layouts.footers.guest')
  </div>
</div>
