
@extends('layouts.app')
@push('head-script')
<link rel="stylesheet" href="{{asset('assets/plugins/custom/nestable/jquery.nestable.css')}}">
@endpush

@section('content')

<div class="row gy-5 g-xl-10">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Menu List</span>
                </h3>
                <div class="card-toolbar">
                    <button id="saveSequence" class="btn btn-sm btn-light-success p-2 mx-1"><i class="fa fa-save"></i> Save</button>
                    <button onClick="getMenu()" class="btn btn-sm btn-light-primary p-2 mx-1">Refresh</button>
                    <button type="button" class="btn btn-sm btn-light-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#modalNew">Add New</button>
                </div>
            </div>
            <div class="card-body">
                <div class="dd" id="nestable">
                    <center>Loading Menu...</center>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalNew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Menu</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>
            <form id="formAddData" action="{{route('admin.menu-create')}}" method="POST">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group py-2">
                        <label>Menu For Level</label>
                        <select name="user_level" id="user_level" class="form-control" required>
                            <option value="">-- Select One --</option>
                            <option value="staff">Staff Level</option>
                            <option value="student">Student Level</option>
                            <option value="parent">Parent Level</option>
                        </select>
                    </div>
                    <div class="form-group py-2">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group py-2">
                        <label>Route Name</label>
                        <input type="text" class="form-control" name="route" id="route" required>
                    </div>
                    <div class="form-group py-2">
                        <label>Favicon</label>
                        <input type="text" class="form-control" name="favicon" id="favicon" required>
                    </div>
                    <div class="form-group py-2">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="form-group py-2">
                        <label>Is Parent</label>
                        <select name="is_parent" id="is_parent" class="form-control" required>
                            <option value="">-- Select One --</option>
                            <option value="1">As Parent</option>
                            <option value="0">Child Menu</option>
                        </select>
                    </div>
                    <div class="form-group py-2 d-none" id="parentList">
                        <label>Parent Menu</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">-- Select One --</option>
                            @foreach ($parentMenu as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group py-2">
                        <label>Is Active</label>
                        <select name="is_active" id="is_active" class="form-control" required>
                            <option value="">-- Select One --</option>
                            <option value="1">Active</option>
                            <option value="0">Hide</option>
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
@endsection

@push('foot-script')
<script src="{{asset('assets/plugins/custom/nestable/jquery.nestable.js')}}"></script>
<script>
    $(document).ready(function() {
        getMenu();
    });
    function makeUL(lst) {
        var html = [];
        html.push('<ol class="dd-list">');

        $(lst).each(function() {
            html.push(makeLI(this))
        });

        html.push('</ol>');
        return html.join("\n");
    }

    function makeLI(elem) {
        var html = [];
        html.push('<li class="dd-item" data-id="'+elem.id+'" data-order="'+elem.order+'">');

        if (!jQuery.isEmptyObject(elem.child))
            html.push('<button data-action="collapse" type="button" style="display: block;">Collapse</button>')
            html.push('<button data-action="expand" type="button" style="display: none;">Expand</button>')
            html.push('<div class="mx-4"><a href="'+'{{url("admin/menu-akses")}}/'+ elem.id +'" class="btn btn-sm btn-success p-2 mx-1" style="display: block; float: right; position: relative; margin-top: 8px;"><i class="fas fa-key"></i> Akses & Edit</a></div>')
            html.push('<div class="dd-handle">'+'<i class="'+elem.favicon+'"></i> ' + elem.name + '</div>');

        if (!jQuery.isEmptyObject(elem.child))
            html.push(makeUL(elem.child));
        html.push('</li>');
        return html.join("\n");
    }

    var subIndicTreeObj = [];

    function findLiChild($obj, parentId, parentOrder) {
        $obj.find('> ol > li').each(function(index1, value1) {
            subIndicTreeObj.push({
                'id': $(this).attr('data-id'),
                'parent_id': parentId,
                'parent_order':parentOrder
            });

            findOlChild($(this));
        });
    }

    function findOlChild($obj) {
        if ($obj.has('ol').length > 0) {
            findLiChild($obj, $obj.attr('data-id'), $obj.attr('data-order'));
        }
    }

    function getMenu(){
        $('#nestable').html('<center>Loading Menu...</center>');
        $('.dd').nestable();
        $.ajax({
            type: "GET",
            url: "{{route('admin.menu-list')}}",
            cache: false,
            dataType:"json",
            success: function(result){
                $(".dd").html(makeUL(result));
            },
            error: function(jqXHR, textStatus, errorThrown) {
                myAlert('Gagal Mendapatkan Data', 'info', 'info');
            }
        });
    };

    $('#saveSequence').on('click', function (e) {
        subIndicTreeObj = [];
        var btnSave = $(this);
        findOlChild($('#nestable'));
        e.preventDefault();
        $(this).attr('disabled', true);
        $(this).html('<i class="fas fa-spinner fa-spin"></i>');
        $.ajax({
            type:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('admin.menu-sequence')}}",
            data:{data:subIndicTreeObj},
            success:function(data){
                if(data.success === true){
                    btnSave.attr('disabled', false);
                    btnSave.html('<i class="fa fa-save"></i> Save');
                    myAlert('Berhasil memperbaharui posisi', 'success', 'success');
                }
            },
            error:function(jqXHR, textStatus, errorThrown){
                myAlert('Gagal Memperbaharui posisi', 'error', 'danger');
                btnSave.attr('disabled', false);
                btnSave.html('Save');
            }
        });
    });
    $('#is_parent').on('change', function () {
        var is_parent = $(this).val();
        if(is_parent == '1'){
            $('#parentList').addClass('d-none');
            $('#parent_id').val('');
        } else {
            $('#parentList').removeClass('d-none');
        }
    });
</script>

@if (count($errors) > 0)
<script type="text/javascript">
    $( document ).ready(function() {
        $('#modalNew').modal('show');
    });
</script>
@endif
@endpush
