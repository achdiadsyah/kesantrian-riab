@extends('layouts.app')

@section('content')
<div class="row gy-5 g-xl-10 align-items-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Log Report</span>
                </h3>
                <div class="card-toolbar">
                    <button onClick="reloadTable()" class="btn btn-sm btn-light-primary p-2 mx-1">Refresh</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" width="100%" id="dataTable">
                        <thead>
                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                <th>#</th>
                                <th>User</th>
                                <th>Description</th>
                                <th>User Agent</th>
                                <th>IP Address</th>
                                <th>Method</th>
                                <th>Access Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('foot-script')
<script type="text/javascript">
$( document ).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        
        ajax: "{{ route('admin.app-log') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user.name', name: 'user.name'},
            {data: 'description', name: 'description'},
            {data: 'agent', name: 'agent'},
            {data: 'ip', name: 'ip'},
            {data: 'method', name: 'method'},
            {data: 'created_at', name:'created_at', render: function (data, type, row) {                    
                return formatDateFull(row.created_at);
            }},
        ]
    });
});
</script>
@endpush