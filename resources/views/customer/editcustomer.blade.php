@extends('layouts.master')
@section('title','Edit Customer')
@section('content')  
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <div class="mt-sm-4 mb-sm-4"><h3>Edit Customer</h3></div>

      <form action="" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="firstname">Customer Name:</label>
          <input type="text" name = "customername" id = "customername" class="form-control" value="{{$data->customername}}" >
          @if($errors->has('customername'))
          <span class="text-danger">{{ $errors->first('customername') }}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="lastname">Email:</label>
          <input type="text" name = "email" id = "email" class="form-control" value="{{$data->email}}">
          @if($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div> 

        <div class="form-group">
          <label for="phone">Mobile Number:</label>
          <input type="text" name = "phone" id = "phone" value="{{$data->phone}}" class="form-control">
          @if($errors->has('phone'))
          <span class="text-danger">{{ $errors->first('phone') }}</span>
          @endif
        </div>

        <div class="form-group">
          <label for="phone">Photo:</label>
           <input type="file" name="image" placeholder="Choose image" id="image">
          @if($errors->has('image'))
          <span class="text-danger">{{ $errors->first('image') }}</span>
          @endif
        </div>

        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>

@endsection