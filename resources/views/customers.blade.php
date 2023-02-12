@section('title','Customers')
@include('header')

<div class="container mt-5">
    <h3>Customers</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-success">
            {{Session::get('error')}}
        </div>
    @endif
    <a href="{{route('customer.create')}}" class="btn btn-primary mb-2">New Customer</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Sl#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td><a href="{{route('customer.edit',encrypt($customer->id))}}" class="btn btn-info">Edit</a> <a href="{{route('delete.customer',encrypt($customer->id))}}" class="btn btn-danger">Delete</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>

@include('footer')