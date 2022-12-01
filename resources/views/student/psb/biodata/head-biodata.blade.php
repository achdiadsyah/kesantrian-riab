@php
    Use App\Models\StudentDocument;
    $picture  = StudentDocument::where(['student_id' => $student->id, 'document_name' => 'Pas-Photo'])->first();    
@endphp
<div class="card mb-9">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
            <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                <img class="mw-50px mw-lg-75px" src="{{$picture ? asset('storage').'/'.$picture->document_url : 'https://ui-avatars.com/api/?name='.auth()->user()->email}}" alt="image" />
            </div>
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-1">
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{$student->name}}</a>
                        </div>
                        <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">
                            @switch($student->status)
                                @case('psb')
                                <span class="badge badge-light-success fs-base">Peserta PSB</span>
                                @break
                                @case('active')
                                <span class="badge badge-light-warning fs-base">Santri Aktif</span>
                                @break
                                @case('moved')
                                <span class="badge badge-light-primary fs-base">Pindah Sekolah</span>
                                @break
                                @case('drop-out')
                                <span class="badge badge-light-danger fs-base">Drop Out</span>
                                @break
                                    
                            @endswitch
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start">
                    <div class="d-flex flex-wrap">
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{ \Carbon\Carbon::parse($student->created_at)->format('d-M-Y')}}</div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400">Tanggal Daftar</div>
                        </div>

                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{$psb_data ? $psb_data->jurusan_pilihan : "N/A"}}</div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400">Jurusan</div>
                        </div>
                        
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{$psb_data ? $psb_data->no_ujian : "N/A"}}</div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400">No Ujian</div>
                        </div>

                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{$psb_data ? strtoupper($psb_data->jalur) : "N/A"}}</div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400">Jalur</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 {{ $page == 'data-diri' ? 'active' : '' }}" href="{{route('psb.biodata', 'data-diri')}}">Data Diri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 {{ $page == 'asal-sekolah' ? 'active' : '' }}" href="{{route('psb.biodata', 'asal-sekolah')}}">Asal Sekolah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 {{ $page == 'orang-tua' ? 'active' : '' }}" href="{{route('psb.biodata', 'orang-tua')}}">Orang Tua & Wali</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 {{ $page == 'prestasi' ? 'active' : '' }}" href="{{route('psb.biodata', 'prestasi')}}">Prestasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 {{ $page == 'dokumen' ? 'active' : '' }}" href="{{route('psb.biodata', 'dokumen')}}">Dokumen</a>
            </li>
        </ul>
    </div>
</div>