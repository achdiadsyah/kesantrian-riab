@extends('layouts.app')

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
    @include('student.psb.biodata.head-biodata')

    <div class="card">
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">Data Prestasi Siswa</div>
        </div>
        <form action="{{route('psb.biodata-prestasi')}}" method="post" id="form_prestasi" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <input type="hidden" value="{{$student->id}}" name="student_id" required>
                <div class="table-responsive">
                    <table class="table table-borderless w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Deskripsi</th>
                                <th>File Sertifikat (Tidak Wajib)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestasi as $item)
                                <tr>
                                    <td style='text-align:center; vertical-align:middle'>
                                        <i class="fas fa-check"></i>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-solid" value="{{$item->description}}" readonly disable>
                                    </td>
                                    <td>
                                        @if($item->evidence_file !== NULL)
                                        <a target="popup" onclick="window.open('{{asset('storage/'.$item->evidence_file)}}','Sertifikat Santri','width=600')" class="btn btn-success btn-sm"><i class="fas fa-search"></i> Show File</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($psb_data && $psb_data->status_biodata == 1)
                                        @else
                                        <button class="btn btn-sm btn-danger" onclick="deletePerformance('{{$item->id}}')" type="button"><i class="fas fa-trash"></i> Remove</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody id="tbody">
    
                        </tbody>
                    </table>
                </div>
                @if($psb_data && $psb_data->status_biodata == 1)
                @else
                <button class="btn btn-sm btn-danger" id="addBtn" type="button"><i class="fas fa-plus"></i> Tambah Prestasi</button>
                @endif
            </div>
            @if($psb_data && $psb_data->status_biodata == 1) 
                
            @else
            <div class="card-footer d-flex justify-content-end py-6 px-9 d-none" id="card-footer">
                <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes & Next</button>
            </div>
            @endif
        </form>
    </div>
</div>
@if($psb_data && $psb_data->status_biodata == 1)
@else
<form action="{{route('psb.biodata-prestasi-delete')}}" method="post" id="formDelete" class="d-none">
    @csrf
    <input type="hidden" value="{{$student->id}}" name="student_id" required>
    <input type="hidden" value="" name="id" id="file_id" required>
</form>
@endif
@endsection

@push('foot-script')
<script>
    $(document).ready(function () {
        var rowIdx = 0;
        $('#addBtn').on('click', function () {
            $('#card-footer').removeClass('d-none');
            $('#tbody').append(`<tr id="R${++rowIdx}">
                <td class="row-index" style='text-align:center; vertical-align:middle'>
                    ${rowIdx}
                </td>
                <td>
                    <input type="text" name="description[]" id="description" class="form-control form-control-solid" placeholder="Ex: Juara 1 Mengaji tingkat desa" required>
                    <small class="text-muted">Deskripsi Prestasi anda</small>
                </td>
                <td>
                    <input type="file" name="evidence_file[]" id="evidence_file" accept="image/*,.pdf" class="form-control form-control-solid">
                    <small class="text-muted">Allowed : PDF/JPG/JPEG/PNG (Max 500KB)</small>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm remove" type="button"><i class="fas fa-trash"></i> Remove</button>
                </td>
            </tr>`);
        });

        $('#tbody').on('click', '.remove', function () {
            var child = $(this).closest('tr').nextAll();
            child.each(function () {
                var id = $(this).attr('id');
                var idx = $(this).children('.row-index').children('p');
                var dig = parseInt(id.substring(1));

                idx.html(`Row ${dig - 1}`);
                $(this).attr('id', `R${dig - 1}`);
            });
    
            $(this).closest('tr').remove();
            rowIdx--;   
            if(rowIdx == 0){
                $('#card-footer').addClass('d-none');
            }
        });
    });

    function deletePerformance(id){
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
