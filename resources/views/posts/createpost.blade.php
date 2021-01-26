@extends('layouts.master')
@section('title','Add Customer')
@section('content')  
  <div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8 mt-5">
            <div class="mt-sm-4 mb-sm-4"><h3>Add Post</h3></div>

            <div class="card">

                <div class="card-header">Create Post</div>

                <div class="card-body">

                    <form method="post" action="">

                        <div class="form-group">

                            @csrf

                            <label class="label">Post Title: </label>

                            <input type="text" name="title" class="form-control" />
                            @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif

                        </div>

                        <div class="form-group">

                            <label class="label">Post Body: </label>

                            <textarea name="body" rows="10" cols="30" class="form-control"></textarea>

                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" />

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection