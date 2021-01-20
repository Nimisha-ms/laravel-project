@extends('layouts.master')
@section('title','Add Customer')
@section('content')  
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <div class="mt-sm-4 mb-sm-4"><h3>Add Customer</h3></div>

      <form action="" method = "post">
        @csrf
        <div class="form-group">
          <label for="firstname">Customer Name:</label>
          <input type="text" name = "customername" id = "customername" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="lastname">Email:</label>
          <input type="text" name = "email" id = "email" class="form-control" required>
        </div>       
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="text" name = "phone" id = "phone" class="form-control" required>
        </div>
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>

@endsection