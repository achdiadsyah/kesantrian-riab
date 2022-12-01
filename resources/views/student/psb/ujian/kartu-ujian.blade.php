@extends('layouts.app')
@push('head-script')

@endpush

@section('content')

<div class="row gy-5 g-xl-10">
    <div class="col-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-label fw-bold text-gray-800">Proses Kartu Ujian</span>
                </div>
            </div>
            <form action="" method="POST">
                @csrf
                <input type="hidden" value="" name="student_id" id="student_id" required>
                <div class="card-body">
                    <div class="form-group">
                      <label for=""></label>
                      <input type="text" class="form-control form-control-solid" name="" id="" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('foot-script')
</script>
@endpush
