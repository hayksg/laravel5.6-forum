@include('layouts.header')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/forum') }}">
                    {{ config('app.name', 'Forum') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        <li class="top-links">
                            <a class="nav-link" href="{{ route('portfolio') }}">Portfolio</a>
                        </li>
                        @if(Auth::check())
                            @if(Auth::user()->admin)
                            <li class="top-links">
                                <a class="nav-link" href="{{ route('channels.index') }}">Manage channels</a>
                            </li>
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="card">
                        <a href="{{ route('discussions.create') }}" class="btn btn-lg btn-primary">
                            Create a new discussion
                        </a>
                        
                        <div class="card-body">
                            <ul class="list-unstyled app-channels-list" id="my-discussions-ul">
                                <li class="list-group-item"><a href="{{ url('/') }}/forum?filter=me">My discussions</a></li>
                                <li class="list-group-item"><a href="{{ url('/') }}/forum?filter=solved">Answered discussions</a></li>
                                <li class="list-group-item"><a href="{{ url('/') }}/forum?filter=unsolved">Unanswered discussions</a></li>
                            </ul>
                        </div>
                        
                        <h5 class="card-header text-center"><strong>Channels</strong></h5>
                        <div class="card-body" id="channels">
                            <ul class="list-unstyled app-channels-list">
                                @foreach($channels as $channel)
                                <li class="list-group-item">
                                    <a href="{{ route('channel', ['slug' => $channel->slug]) }}">{{ $channel->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
        
    </div>

@include('layouts.footer')