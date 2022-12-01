@extends('layouts.app')

@section('content')
<div class="row gy-5 g-xl-10 align-items-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Role List</span>
                </h3>
                <div class="card-toolbar">
                    <button onClick="reloadTable()" class="btn btn-sm btn-light-primary p-2 mx-1">Refresh</button>
                    <button type="button" class="btn btn-sm btn-light-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#modalNew">Add New</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" width="100%" id="dataTable">
                        <thead>
                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
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

<div class="modal fade" tabindex="-1" id="modalNew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Role</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>
            <form id="formAddData" action="{{route('admin.role-create-data')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group py-2">
                        <label>Role Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-sm btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn-sm btn btn-primary">Save User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form class="d-none" action="{{route('admin.role-delete')}}" id="formDelete" method="POST">
@csrf
<input type="hidden" name="id" id="data_id" val="" required>
</form>

@endsection
@push('foot-script')
<script type="text/javascript">
$( document ).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: "{{ route('admin.role-list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'id', name:'action', render: function (data, type, row) {       
                return `<a href="{{url('admin/role-detail')}}/${row.id}" class="btn btn-sm btn-info">Detail</a>
                        <button onclick="deleteData('${row.id}')" class="btn btn-sm btn-danger">Delete</button>`;         
            }},
        ]
    });
});

function deleteData(id) {
    console.log(id);
    Swal.fire({
        title: 'Do you want to delete the data?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Yes Delete',
        }).then((result) => {
        if (result.isConfirmed) {
            $('#data_id').val(id);
            $( "#formDelete" ).submit();
        }
    })
}
</script>
@endpush