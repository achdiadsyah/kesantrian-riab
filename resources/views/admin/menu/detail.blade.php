
@extends('layouts.app')
@push('head-script')

@endpush

@section('content')

<div class="row gy-5 g-xl-10">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Menu Detail</div>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="form-group">
                      <label>Menu Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$menuData->name}}" required>
                    </div>
                    <div class="form-group">
                      <label>Menu Alias</label>
                      <input type="text" class="form-control" name="alias" id="alias" value="{{$menuData->alias}}" required>
                    </div>
                    <div class="form-group">
                      <label>Menu Route</label>
                      <input type="text" class="form-control" name="route" id="route" value="{{$menuData->route}}" required>
                    </div>
                    <div class="form-group">
                      <label>Menu Icon</label>
                      <input type="text" class="form-control" name="favicon" id="favicon" value="{{$menuData->favicon}}" required>
                    </div>
                    <div class="form-group">
                      <label>Menu Description</label>
                      <textarea class="form-control" name="description" id="description" cols="30" rows="3" required>{{$menuData->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Menu Description</label>
                      <select class="form-control" name="is_active" id="is_active" required>
                            <option value="">-- Select Status --</option>
                            <option value="1" @if($menuData->is_active == '1') selected @endif>Active</option>
                            <option value="0" @if($menuData->is_active == '0') selected @endif>Maintenance</option>
                      </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm" type="submit">Update </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Menu Permission
                </div>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <th>
                            <td>#</td>
                            <td>Name</td>
                            <td>Action</td>
                        </th>
                    </thead>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@push('foot-script')


@endpush
