@extends('layouts.app')

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
    @include('student.psb.biodata.head-biodata')

    <div class="row g-6 g-xl-9">

        <div class="col-sm-6 col-xl-6">
            <div class="card h-100">
                <div class="card-header flex-nowrap border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol symbol-45px w-45px bg-light">
                            <img src="{{asset('assets/media/icons/duotune/files')}}/fil003.svg" class="p-3">
                        </div>
                        <a class="fs-3 fw-semibold text-hover-primary text-gray-700 m-0">Pas Photo (3x4)</a>
                    </div>
                    <div class="card-toolbar">
                        <span class="badge badge-danger">Wajib Upload</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                    @if(!empty($photo))
                    <p class="text-center fs-3">File Uploaded <i class="fas fa-check"></i></p>
                    <div class="btn-group" role="group">
                        <a target="popup" onclick="window.open('{{asset('storage/'.$photo->document_url)}}','File','width=600')" class="btn btn-success"><i class="fas fa-search"></i> Show File</a>
                        @if($psb_data && $psb_data->status_biodata == 1)
                        @else 
                        <button type="button" class="btn btn-danger" onclick="deleteDocument('{{$photo->id}}')"><i class="fas fa-trash"></i> Delete File</button>
                        @endif
                    </div>
                    @else
                    <form action="{{route('psb.biodata-dokumen')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student_id" required>
                        <input type="hidden" value="Pas-Photo" name="document_name" id="document_name" required>
                        <div class="input-group">
                            <input type="file" class="form-control form-control-solid @error('pas_photo') is-invalid @enderror" name="pas_photo" id="pas_photo" accept="image/*" required>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            @error('pas_photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <small class="text-muted">Allowed : JPG/JPEG/PNG (Max 500KB)</small>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-6">
            <div class="card h-100">
                <div class="card-header flex-nowrap border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol symbol-45px w-45px bg-light">
                            <img src="{{asset('assets/media/icons/duotune/files')}}/fil003.svg" class="p-3">
                        </div>
                        <a class="fs-3 fw-semibold text-hover-primary text-gray-700 m-0">SK Rangking</a>
                    </div>
                    <div class="card-toolbar">
                        <span class="badge badge-success">Tidak Wajib</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                    @if(!empty($sk))
                    <p class="text-center fs-3">File Uploaded <i class="fas fa-check"></i></p>
                    <div class="btn-group" role="group">
                        <a target="popup" onclick="window.open('{{asset('storage/'.$sk->document_url)}}','File','width=600')" class="btn btn-success"><i class="fas fa-search"></i> Show File</a>
                        @if($psb_data && $psb_data->status_biodata == 1)
                        @else 
                        <button type="button" class="btn btn-danger" onclick="deleteDocument('{{$sk->id}}')"><i class="fas fa-trash"></i> Delete File</button>
                        @endif
                      </div>
                    @else
                    <form action="{{route('psb.biodata-dokumen')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student_id" required>
                        <input type="hidden" value="SK-Rangking" name="document_name" id="document_name" required>
                        <div class="input-group">
                            <input type="file" class="form-control form-control-solid @error('sk_rangking') is-invalid @enderror" name="sk_rangking" id="sk_rangking" accept="image/*,.pdf" required>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            @error('sk_rangking')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <small class="text-muted">Allowed : PDF/JPG/JPEG/PNG (Max 500KB)</small>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-6">
            <div class="card h-100">
                <div class="card-header flex-nowrap border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol symbol-45px w-45px bg-light">
                            <img src="{{asset('assets/media/icons/duotune/files')}}/fil003.svg" class="p-3">
                        </div>
                        <a class="fs-3 fw-semibold text-hover-primary text-gray-700 m-0">Raport Semester 1</a>
                    </div>
                    <div class="card-toolbar">
                        <span class="badge badge-danger">Wajib Upload</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                    @if(!empty($raport_1))
                    <p class="text-center fs-3">File Uploaded <i class="fas fa-check"></i></p>
                    <div class="btn-group" role="group">
                        <a target="popup" onclick="window.open('{{asset('storage/'.$raport_1->document_url)}}','File','width=600')" class="btn btn-success"><i class="fas fa-search"></i> Show File</a>
                        @if($psb_data && $psb_data->status_biodata == 1)
                        @else 
                        <button type="button" class="btn btn-danger" onclick="deleteDocument('{{$raport_1->id}}')"><i class="fas fa-trash"></i> Delete File</button>
                        @endif
                      </div>
                    @else
                    <form action="{{route('psb.biodata-dokumen')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student_id" required>
                        <input type="hidden" value="Raport-1" name="document_name" id="document_name" required>
                        <div class="input-group">
                            <input type="file" class="form-control form-control-solid @error('raport_1') is-invalid @enderror" name="raport_1" id="raport_1" accept="image/*,.pdf" required>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            @error('raport_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <small class="text-muted">Allowed : PDF/JPG/JPEG/PNG (Max 500KB)</small>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-6">
            <div class="card h-100">
                <div class="card-header flex-nowrap border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol symbol-45px w-45px bg-light">
                            <img src="{{asset('assets/media/icons/duotune/files')}}/fil003.svg" class="p-3">
                        </div>
                        <a class="fs-3 fw-semibold text-hover-primary text-gray-700 m-0">Raport Semester 2</a>
                    </div>
                    <div class="card-toolbar">
                        <span class="badge badge-danger">Wajib Upload</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                    @if(!empty($raport_2))
                    <p class="text-center fs-3">File Uploaded <i class="fas fa-check"></i></p>
                    <div class="btn-group" role="group">
                        <a target="popup" onclick="window.open('{{asset('storage/'.$raport_2->document_url)}}','File','width=600')" class="btn btn-success"><i class="fas fa-search"></i> Show File</a>
                        @if($psb_data && $psb_data->status_biodata == 1)
                        @else 
                        <button type="button" class="btn btn-danger" onclick="deleteDocument('{{$raport_2->id}}')"><i class="fas fa-trash"></i> Delete File</button>
                        @endif
                      </div>
                    @else
                    <form action="{{route('psb.biodata-dokumen')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student_id" required>
                        <input type="hidden" value="Raport-2" name="document_name" id="document_name" required>
                        <div class="input-group">
                            <input type="file" class="form-control form-control-solid @error('raport_2') is-invalid @enderror" name="raport_2" id="raport_2" accept="image/*,.pdf" required>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            @error('raport_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <small class="text-muted">Allowed : PDF/JPG/JPEG/PNG (Max 500KB)</small>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-6">
            <div class="card h-100">
                <div class="card-header flex-nowrap border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol symbol-45px w-45px bg-light">
                            <img src="{{asset('assets/media/icons/duotune/files')}}/fil003.svg" class="p-3">
                        </div>
                        <a class="fs-3 fw-semibold text-hover-primary text-gray-700 m-0">Raport Semester 3</a>
                    </div>
                    <div class="card-toolbar">
                        <span class="badge badge-danger">Wajib Upload</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                    @if(!empty($raport_3))
                    <p class="text-center fs-3">File Uploaded <i class="fas fa-check"></i></p>
                    <div class="btn-group" role="group">
                        <a target="popup" onclick="window.open('{{asset('storage/'.$raport_3->document_url)}}','File','width=600')" class="btn btn-success"><i class="fas fa-search"></i> Show File</a>
                        @if($psb_data && $psb_data->status_biodata == 1)
                        @else 
                        <button type="button" class="btn btn-danger" onclick="deleteDocument('{{$raport_3->id}}')"><i class="fas fa-trash"></i> Delete File</button>
                        @endif
                      </div>
                    @else
                    <form action="{{route('psb.biodata-dokumen')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student_id" required>
                        <input type="hidden" value="Raport-3" name="document_name" id="document_name" required>
                        <div class="input-group">
                            <input type="file" class="form-control form-control-solid @error('raport_3') is-invalid @enderror" name="raport_3" id="raport_3" accept="image/*,.pdf" required>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            @error('raport_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <small class="text-muted">Allowed : PDF/JPG/JPEG/PNG (Max 500KB)</small>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-xl-6">
            <div class="card h-100">
                <div class="card-header flex-nowrap border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol symbol-45px w-45px bg-light">
                            <img src="{{asset('assets/media/icons/duotune/files')}}/fil003.svg" class="p-3">
                        </div>
                        <a class="fs-3 fw-semibold text-hover-primary text-gray-700 m-0">Raport Semester 4</a>
                    </div>
                    <div class="card-toolbar">
                        <span class="badge badge-danger">Wajib Upload</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                    @if(!empty($raport_4))
                    <p class="text-center fs-3">File Uploaded <i class="fas fa-check"></i></p>
                    <div class="btn-group" role="group">
                        <a target="popup" onclick="window.open('{{asset('storage/'.$raport_4->document_url)}}','File','width=600')" class="btn btn-success"><i class="fas fa-search"></i> Show File</a>
                        @if($psb_data && $psb_data->status_biodata == 1)
                        @else 
                        <button type="button" class="btn btn-danger" onclick="deleteDocument('{{$raport_4->id}}')"><i class="fas fa-trash"></i> Delete File</button>
                        @endif
                      </div>
                    @else
                    <form action="{{route('psb.biodata-dokumen')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student_id" required>
                        <input type="hidden" value="Raport-4" name="document_name" id="document_name" required>
                        <div class="input-group">
                            <input type="file" class="form-control form-control-solid @error('raport_4') is-invalid @enderror" name="raport_4" id="raport_4" accept="image/*,.pdf" required>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            @error('raport_4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <small class="text-muted">Allowed : PDF/JPG/JPEG/PNG (Max 500KB)</small>
                    </form>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@if($psb_data && $psb_data->status_biodata == 1)
@else
<form action="{{route('psb.biodata-dokumen-delete')}}" method="post" id="formDelete" class="d-none">
    @csrf
    <input type="hidden" value="{{$student->id}}" name="student_id" required>
    <input type="hidden" value="" name="id" id="file_id" required>
</form>
@endif
@endsection
@push('foot-script')

<script>
function deleteDocument(id){
    Swal.fire({
        title: 'Do you want to delete the data?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Yes Delete',
        }).then((result) => {
        if (result.isConfirmed) {
            $('#file_id').val(id);
            $( "#formDelete" ).submit();
        }
    })
}
</script>
@endpush
