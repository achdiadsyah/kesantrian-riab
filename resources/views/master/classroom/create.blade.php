
@extends('layouts.app')
@push('head-script')

@endpush

@section('content')

<div class="row gy-5 g-xl-10">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="card-title align-items-start flex-column">Add Classroom</div>
            </div>
            <form id="formData" action="{{route('master/classroom-list-store')}}" method="POST">
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="classroom_id" id="classroom_id" value="" required>
                    <div class="form-group py-3">
                        <label>Class Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Ex : X-IPA-3" name="name" id="name" required/>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group py-3">
                        <label>Select Class Focus</label>
                        <select name="focus" id="focus" class="form-control  @error('focus') is-invalid @enderror" required>
                            <option value="">-- Select Class Focus --</option>
                            <option value="ipa">IPA</option>
                            <option value="mak">MAK</option>
                        </select>
                        @error('focus')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group py-3">
                        <label>Class Grade</label>
                        <select name="grade" id="grade" class="form-control  @error('grade') is-invalid @enderror" required>
                            <option value="">-- Select Class Grade --</option>
                            <option value="X">X - 10</option>
                            <option value="XI">XI - 11</option>
                            <option value="XII">XII - 12</option>
                        </select>
                        @error('grade')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group py-3">
                        <label>Class Limit</label>
                        <div class="input-group">
                            <input type="number" class="form-control  @error('limit') is-invalid @enderror" placeholder="Ex : 32" name="limit" id="limit" required/>
                            <span class="input-group-text" id="basic-addon2">Person</span>
                            @error('limit')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group py-3">
                        <label>Classroom Head</label>
                        <select name="head_id" id="head_id" class="form-control  @error('head_id') is-invalid @enderror" required>
                            <option value="">-- Select Classroom Head --</option>
                            @foreach ($staff_list as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('head_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group py-3">
                        <label>Classroom Facility</label>
                        <textarea name="facility" id="facility" rows="5" class="form-control" required></textarea>
                        @error('facility')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection

@push('foot-script')

</script>
@endpush
