<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    @auth
    @if(Auth::user()->isAdmin())
    <a class="navbar-brand" href="{{route('tickets.index')}}">Service Desk</a>
    @else
    <a class="navbar-brand" href="{{url('tickets/my-tickets/') }}">Service Desk</a>

    @endif
    @else
    <a class="navbar-brand" href="">Service Desk</a>
    @endauth


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav ml-auto">

        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('register') }}">{{__('Register') }}</a> --}}
        </li>
        @endif

        @else
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('tickets/create')}}">Create ticket</a>
                </li>


                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{url('/')}}">Wyloguj</a> --}}
                </li>



                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        @if (Auth::user()->isAdmin())
                        <a class="dropdown-item" href="{{url('tickets/my-tickets') }}">My
                            tickets</a>
                        <a class="dropdown-item" href="{{route('tickets.index')}}">All tickets</a>
                        @else

                        <a class="dropdown-item" href="{{url('tickets/my-tickets/') }}">
                            My tickets</a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

            </ul>
        </div>

        </li>


        @endguest
    </ul>
    </div>
</nav>
