<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.themes' ? 'active' : '' }}" href="{{ route('admin.themes') }}">
                <i class="app-menu__icon fa fa-film"></i>
                <span class="app-menu__label">Themes</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                <i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">Users</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.admins.index' ? 'active' : '' }}" href="{{ route('admin.admins.index') }}">
                <i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">Admin Panel</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}"
                href="{{ route('admin.categories.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Services</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                <i class="app-menu__icon fa fa-shopping-bag"></i>
                <span class="app-menu__label">Packages</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.tickets.index' ? 'active' : '' }}" href="{{ route('admin.tickets.index') }}">
                <i class="app-menu__icon fa fa-ticket"></i>
                <span class="app-menu__label">Tickets</span>
            </a>
        </li>
        
        <li class="treeview">
          <a class="app-menu__item {{ Route::currentRouteName() == 'blog.category' ? 'active' : '' || Route::currentRouteName() == 'blog.tag' ? 'active' : '' || Route::currentRouteName() == 'blog.post' ? 'active' : '' || Route::currentRouteName() == 'blog.all.trashed.post' ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Blog Options</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item {{ Route::currentRouteName() == 'blog.category' ? 'active' : '' }}" href="{{ route('blog.category') }}" href="{{ route('blog.category') }}"><i class="icon fa fa-circle-o"></i> All Categories</a>
            </li>
            <li>
              <a class="treeview-item {{ Route::currentRouteName() == 'blog.tag' ? 'active' : '' }}" href="{{ route('blog.tag') }}"><i class="icon fa fa-circle-o"></i> All Tags</a>
            </li>
            <li>
              <a class="treeview-item {{ Route::currentRouteName() == 'blog.post' ? 'active' : '' }}" href="{{ route('blog.post') }}" href="{{ route('blog.post') }}"><i class="icon fa fa-circle-o"></i> All Live Posts</a>
            </li>
            <li>
              <a class="treeview-item {{ Route::currentRouteName() == 'blog.all.trashed.post' ? 'active' : '' }}" href="{{ route('blog.all.trashed.post') }}" href="{{ route('blog.all.trashed.post') }}"><i class="icon fa fa-circle-o"></i> All Trashed Posts</a>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a class="app-menu__item {{ Route::currentRouteName() == 'admin.pages.index' ? 'active' : '' || Route::currentRouteName() == 'admin.pages.create' ? 'active' : '' || Route::currentRouteName() == 'admin.pages.edit' ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">CMS Tools</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item {{ Route::currentRouteName() == 'admin.pages.index' ? 'active' : '' }}" href="{{ route('admin.pages.index') }}" href="{{ route('blog.category') }}"><i class="icon fa fa-circle-o"></i> Manage Pages</a>
            </li>
            
          </ul>
        </li>
    </ul>
</aside>