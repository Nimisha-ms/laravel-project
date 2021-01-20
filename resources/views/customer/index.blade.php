@extends('layouts.master')
@section('title','Customer')
@section('content')

  <div class="row">
    <div class="col-sm-12">

    	<div class="mt-sm-4 mb-sm-4">
    		<div class="row">
			  <div class="col-md-8"><h3>Customer list</h3></div>
			  <div class="col-md-4">
 				<a class="btn btn-success" href="{{ url('addcustomer') }}"> Add New Customer</a>
			  </div>
		</div>  

     @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif  	
    	</div>

      	<table class="table table-bordered">
	       <tr>
	          <th>ID</th>
	          <th>Customer Name</th>
	          <th>Email</th>          
	          <th>Phone No</th>
            <th>Action</th>
	       </tr>
	    @php($count=0)   
        @foreach($data as $datas)
        @php($count++)
          <tr>
          	<td>{{ $count }}</td>
            <td>{{ $datas->customername }}</td>
            <td>{{ $datas->email }}</td>
            <td>{{ $datas->phone }}</td>            
            <td> <a href='{{ url("editcustomer",$datas->id) }}'>Edit</a> | 
              <a href='{{ url("deletecustomer",$datas->id) }}'>Delete</a></td>
          </tr>
        @endforeach
      </table>
       

    </div>
  </div>
@endsection