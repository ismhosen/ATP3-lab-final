<a class="" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
    <span class="fa fa-sign-out">logout</span>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>


<h1>{{Auth::user()->type}}</h1>
 <br>

 <a href="{{ route('admin.newUsers') }}">Insert Users</a>