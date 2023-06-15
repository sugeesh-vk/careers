
@extends('layout.web')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Job Name</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applicants as $applican)
                <tr>
                    <td>{{$applican->name}}</td>
                    <td>{{$applican->email}}</td>
                    <td>{{$applican->phone}}</td>
                    <td>{{$applican->job}}</td>
                    <td>
                        <ul style="display:flex;padding:0;margin:0">
                            <li style="list-style:none"><a href="{{asset('applicantdetete/'.$applican->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                            <li style="list-style:none;margin-left:10px"><a href="{{asset('uploads/'.$applican->file)}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tfoot>
        </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
    $('#datatable').DataTable();
});
</script>
@endpush