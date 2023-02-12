@section('title','home')
@include('header')
    <h1>Welcome {{auth()->user()->name}}</h1>
    <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
@include('footer')
