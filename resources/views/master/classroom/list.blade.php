
@extends('layouts.app')
@push('head-script')

@endpush

@section('content')

<div class="row gy-5 g-xl-10">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title align-items-start flex-column">
                    Master Data Classroom
                </div>
                <div class="card-toolbar">
                    <a class="btn btn-primary btn-sm" href="{{route('master/classroom-list-create')}}">Add Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                           <th>#</th>
                           <th>Class Name</th> 
                           <th>Class Focus</th> 
                           <th>Class Grade</th> 
                           <th>Class Limit</th> 
                           <th>Class Head</th> 
                           <th>Action</th> 
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('foot-script')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('master/classroom-list')}}",
            columns: [
                { data: 'name' },
                { data: 'focus' },
                { data: 'grade' },
                { data: 'limitation' },
                { data: 'head.name' },
            ]
        });
    });
</script>
@endpush
