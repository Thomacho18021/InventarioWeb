@inject('request', 'Illuminate\Http\Request')

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu Principal</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ ($request->segment(1) == '')?'active':'' }}"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Home</span></a></li>
            <li class="{{ ($request->segment(1) == 'productos')?'active':'' }}"><a href="{{ url('/productos') }}"><i class='fa fa-shopping-basket'></i> <span>Productos</span></a></li>
            <li class="{{ ($request->segment(1) == 'categorias')?'active':'' }}"><a href="{{ url('/categorias') }}"><i class='fa fa-shopping-basket'></i> <span>Categorias</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
