
@extends('layout.web')
@section('content')

<div class="row">
    <div class="container">
      <div class="row">
        <div class="col-md-4 ml-auto">
          <form action="{{url('search')}}">
            @csrf
            <div class="form-row mt-5">  
              <div class="form-group col-md-8">
                <input type="search" name="name" class="form-control" placeholder="Search">
              </div>
                <div class="form-group col-md-4">
                  <input type="submit" value="search" class="form-control" placeholder="Email">
                </div>
              </div>
            </form>
        </div>
      </div>
      <div class="row pt-3">
        <ul class="nav nav-tabs col-md-6 d-flex flex-direction-column text-left">
            @foreach($careers as $career)
          <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#{{$career->name}}">
                <h5>{{$career->name}}</h5>
                <p>{!!  substr(strip_tags($career->job_description), 0, 150) !!}</p>
            </a>
          </li>
            @endforeach
        </ul>
        <div class="col-md-6">
          <!-- Tab panes -->
          <div class="tab-content">
            @foreach($careers as $career)
            <div class="tab-pane" id="{{$career->name}}">
              <div class="tab-header">
                <h4>{{$career->name}}</h4>
                <h6>{{$career->job_title}}</h6>
                <p>{{$career->job_type}}</p>
              </div>
              <div class="tab-body">
                <p style="overflow:scroll">{{$career->job_description}}</p>
                <div class="d-flex">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$career->id}}">Apply Now</button>
                  <a href="{{url('viewapplicant/'.$career->job_title)}}" type="button" class="btn btn-light ml-auto" >View Applicants</a>
                </div>
                <!-- modal start -->

                <!-- Modal -->
                <div class="modal fade" id="{{$career->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Apply Now - {{$career->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{url('save_careers')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Name">
                              <input type="hidden" name="job" class="form-control" value="{{$career->job_title}}">
                            </div>
                            <div class="form-group col-md-12">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                              <label>Phone Number</label>
                              <input type="text" name="number" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group col-md-12">
                              <label>Resume</label>
                              <input type="file" name="file" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Apply</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
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
        </div>
      </div>
    </div>
</div>


@endsection