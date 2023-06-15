
@extends('layout.web')
@section('content')
<div class="container">
  <div class="row" >
    <div class="col-md-6 mt-5">
    <form class="row" action="{{url('careerssave')}}" method="post">
      @csrf
      <div class="col-md-12 mb-4">
        <h3>Create Careers</h3>
      </div>
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Company Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Company Name">
      </div>
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Company Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
      </div>
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Phone Number</label>
        <input type="text" name="phone" class="form-control" placeholder="Enter ">
      </div>
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Location</label>
        <input type="text" name="location" class="form-control" placeholder="Enter email">
      </div>
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Job Title</label>
        <input type="text" name="jobtitle" class="form-control" placeholder="Enter email">
      </div>
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Job Type</label>
        <select name="type" id="" class="form-control">
          <option value="fulltime">Full time</option>
          <option value="parttime">Part time</option>
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Job Description</label>
        <textarea type="text" name="jobdescription" class="form-control" placeholder=""></textarea>
      </div>
      <div class="col-md-12 row">
      <button type="submit" class="btn btn-primary ml-auto">Save</button>
    </div>
    </form>
      
    </div>
    <div class="col-md-6" style="background-image:url('{{ asset('web/images/careersbg.png')}}');width: 100%;
background-size: cover;
background-position: bottom;">

    </div>
    <div class="col-md-12">
        <div class="col-md-12">
        
      @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
        </div></div>
  </div>
</div>


@endsection