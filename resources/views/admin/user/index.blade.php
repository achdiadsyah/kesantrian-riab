@extends('layouts.app')

@section('content')
<div class="row gy-5 g-xl-10 align-items-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Users List</span>
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
                                <th>Email</th>
                                <th>User Level</th>
                                <th>Join Date</th>
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
                <h3 class="modal-title">Add New User</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>
            <form id="formAddData" action="{{route('admin.user-create-data')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group py-2">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group py-2">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group py-2">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" id="password" value="12345678" required>
                    </div>
                    <div class="form-group py-2">
                        <label>User Role</label>
                        <select class="form-control" name="role_id" id="role_id" required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group py-2">
                        <label>User Level</label>
                        <select class="form-control" name="user_level" id="user_level" required>
                            <option value="">Select Level</option>
                            <option value="staff">Staff</option>
                            @if(auth()->user()->user_level == "super")
                            <option value="super">Super Admin</option>
                            @endif
                        </select>
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

<form class="d-none" action="{{route('admin.user-delete')}}" id="formDelete" method="POST">
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
        ajax: "{{ route('admin.user-list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'user_level', name: 'user_level', render: function(data, type, row) {
                switch (row.user_level) {
                    case 'super':
                        return `<span class="badge py-2 px-3 badge-light-danger">${capitalize(row.user_level)}</span>`;
                        break;
                    case 'staff':
                        return `<span class="badge py-2 px-3 badge-light-success">${capitalize(row.user_level)}</span>`;
                        break;
                    case 'student':
                        return `<span class="badge py-2 px-3 badge-light-primary">${capitalize(row.user_level)}</span>`;
                        break;
                }
            }},
            {data: 'created_at', name:'created_at', render: function (data, type, row) {                    
                return formatDate(row.created_at);
            }},
            {data: 'id', name:'action', render: function (data, type, row) {       
                if(row.user_level !== 'super' ){
                    return `<a href="{{url('admin/user-detail')}}/${row.id}" class="btn btn-sm btn-info">Detail</a>
                            <button onclick="deleteData('${row.id}')" class="btn btn-sm btn-danger">Delete</button>`;
                } else {
                    return `<a href="{{url('admin/user-detail')}}/${row.id}" class="btn btn-sm btn-info">Detail</a>`;
                }             
            }},
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 10001, targets: 4 },
            { responsivePriority: 1, targets: -1 }
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