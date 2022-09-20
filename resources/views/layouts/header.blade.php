{{-- navigation menu --}}

@guest
<?php $selected_theme = App\Models\Theme::where('id', 1)->first()->theme; ?>  

@if ($selected_theme == 'Classic')
    <link rel="stylesheet" href="{{ asset('/assets/themes/classic.css') }}">
@elseif ($selected_theme == 'Midnight_Blue')
    <link rel="stylesheet" href="{{ asset('/assets/themes/midnight_blue.css') }}">
@elseif ($selected_theme == 'Cyan')
    <link rel="stylesheet" href="{{ asset('/assets/themes/cyan.css') }}">
@elseif ($selected_theme == 'Purple')
    <link rel="stylesheet" href="{{ asset('/assets/themes/purple.css') }}">
@elseif ($selected_theme == 'Christmas')
    <link rel="stylesheet" href="{{ asset('/assets/themes/christmas.css') }}">
@elseif ($selected_theme == 'Blue')
    <link rel="stylesheet" href="{{ asset('/assets/themes/blue.css') }}">
@elseif ($selected_theme == 'Dark')
    <link rel="stylesheet" href="{{ asset('/assets/themes/dark.css') }}">
@endif
@else
<?php $user_theme = Auth::user()->theme; ?>

@if ($user_theme == 'Classic')
    <link rel="stylesheet" href="{{ asset('/assets/themes/classic.css') }}">
@elseif ($user_theme == 'Midnight_Blue')
    <link rel="stylesheet" href="{{ asset('/assets/themes/midnight_blue.css') }}">
@elseif ($user_theme == 'Cyan')
    <link rel="stylesheet" href="{{ asset('/assets/themes/cyan.css') }}">
@elseif ($user_theme == 'Purple')
    <link rel="stylesheet" href="{{ asset('/assets/themes/purple.css') }}">
@elseif ($user_theme == 'Christmas')
    <link rel="stylesheet" href="{{ asset('/assets/themes/christmas.css') }}">
@elseif ($user_theme == 'Blue')
    <link rel="stylesheet" href="{{ asset('/assets/themes/blue.css') }}">
@elseif ($user_theme == 'Dark')
    <link rel="stylesheet" href="{{ asset('/assets/themes/dark.css') }}">
@endif

@endguest
<hr class="hr">
<nav id="nav" class="navbar navbar-default navbar-full">
    <div class="container container-nav">
        <div class="navbar-header">
            <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="/">
                @if (config('settings.site_logo') != null)
                    <img class="logo" src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="Logo">
                @else
                    <img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="Logo">
                @endif
            </a>
        </div>
        <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="/">Home</a></li>
                @else
                <li><a href="{{ route('home') }}">Portal</a></li>
                @endguest
                <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                <li class="dropdown">
                    @foreach($categories as $cat)
                        @foreach($cat->items as $category)
                            @if ($category->items->count() > 0)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                        @foreach($category->items as $item)
                                            <li><a class="dropdown-item" href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endforeach
                </li>

                @if(Auth::check())
                    @if(Auth::user())
                        <li class="dropdown">
                            <a href="pages.html">CMS Tools <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/my-gallery">My Gallery</a></li>
                                <li><a href="/my-blogs">My Blogs</a></li>
                                <li><a href="/publish-blog">Publish New Blog</a></li>
                            </ul>
                        </li>
                    @endif
                @endif
                <!--<li><a href="{{ route('domain') }}">Domain</a></li>-->
                {{-- <li><a href="#">Pricing</a></li> --}}
                <li>
                    <a href="{{ route('checkout.cart') }}" class="icontext">
                        <i class="fa fa-shopping-cart"></i>
                        <small>{{ $cartCount }} items</small>
                    </a>
                </li>
                <!-- <li><a class="signin-button" href="signin.html">Sign in</a></li> -->
                @guest
                <li><a class="chat-button" href="{{ route('login') }}"><i class="fas fa-lock"></i> Log in</a></li>
                @else
                <li><a href="{{ route('account.orders') }}">Orders</a></li>
                <li><a href="{{ route('inbox') }}">Inbox</a></li>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            <i class="fa fa-user"></i> {{ Auth::user()->full_name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('settings') }}"><i class="fa fa-cog"></i>
                                    Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('users.show') }}"><i class="fa fa-user"></i>
                                    Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<hr class="hr">