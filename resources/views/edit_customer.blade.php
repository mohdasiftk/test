@section('title','Edit Customer')
@include('header')
<div class="container mt-5">
    <h2>Edit Customer</h2>
    <form action="{{route('update.customer')}}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>    
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
        <div class="alert alert-danger">
        {{Session::get('message')}}
        </div>
        @endif
        <input type="hidden" name="id" value="{{encrypt($customer->id)}}"/>
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$customer->name}}">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$customer->email}}">
        </div>
        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{$customer->phone}}">
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>
@include('footer')