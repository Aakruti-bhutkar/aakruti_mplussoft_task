<div class="navbar">
    <a href="#" class="active">Mplussoft</a>
    <a href="{{config('app.baseURL')}}/user-package/all">User Management</a>
    <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" {{ __('Logout') }} class="right"> Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
</div>