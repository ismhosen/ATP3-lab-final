<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">	

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

 <a href="{{ route('admin.newUsers') }}">Insert Users</a><hr>

 <font size="5">All users</font>

 <table class="table">
     <thead>
         <tr>
             <td>Name</td>
             <td>Email</td>
             <td>Password</td>
             <td>Address</td>
             <td>type</td>
             <td>profile</td>
             <td>Add</td>
             <td>Block</td>
         </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->type}}</td>
                <td><a href="{{route('profile',$user->id)}}">Got to profile</a></td>                
                @if ($user->status=='active')
                    <td>-</td>
                @else
                    <td><a href="{{route('admin.statusActive',$user->id)}}">Add</a></td>
                @endif
                @if ($user->status=='block')
                    <td>-</td>                                    
                @else
                <td><a href="{{route('admin.statusBlock',$user->id)}}">Block</a></td>                                    
                @endif
            </tr>
        @endforeach
        
    </tbody>
 </table>

 <hr>