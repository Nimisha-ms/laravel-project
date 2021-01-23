@extends('layouts.master')
@section('title','Add Contact')
@section('content')  
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <!-- <div class="mt-sm-4 mb-sm-4"><h3>Contact Us</h3></div> -->

      <form action="" method = "post" enctype="multipart/form-data">
        @csrf
        <!-- form card login with validation feedback -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Contact</h3>
                        </div>

                      @if($message = Session::get('success'))
                      <div class="alert alert-success">{{ $message }}
                      </div>
                      @endif

                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="loginForm" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                    <div class="invalid-feedback">Please enter your name</div>
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                     <input type="text" class="form-control" name="email" id="email">
                                    <div class="invalid-feedback">Please enter email</div>
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                               <div class="form-group">
                                    <label>Phone</label>
                                     <input type="text" class="form-control" name="phone" id="phone">
                                    <div class="invalid-feedback">Please enter phone</div>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                     <input type="text" class="form-control" name="subject" id="subject">
                                    <div class="invalid-feedback">Please enter subject</div>
                                </div>
                                 <div class="form-group">
                                    <label>Message</label>
                                     <textarea class="form-control" name="message" id="message"></textarea>
                                    <div class="invalid-feedback">Please enter subject</div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Submit</button>
                            </form>
                        </div>
                        <!--/card-body-->
                    </div>
                    <!-- /form card login -->

        
      </form>
    </div>
  </div>

@endsection