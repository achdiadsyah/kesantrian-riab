@extends('layouts.app')
@push('head-script')
<link href="{{ asset('assets/css/filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/filepond-plugin-image-preview.css') }}" rel="stylesheet"/>
@endpush

@section('content')

<div class="row gy-5 g-xl-10">
    <div class="col-md-8">
        <div class="card card-flush">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Payment Process</span>
                </h3>
            </div>
            @if(auth()->user()->referral_code !== NULL)
            <div class="card-body pt-6">
                <div class="text-center">
                    <img src="{{asset('assets/media/svg/other/check.svg')}}" width="90px">
                    <p class="lead">Anda adalah peserta jalur undangan.</p>
                    <p>Tidak ada uang pendaftaran untuk peserta dengan jalur undangan. Silahkan lanjut untuk mengisi biodata</p>
                </div>
            </div>
            @else
                @if($payment_status)
                <div class="card-body pt-6">
                    <div class="text-center">
                        
                        @if($payment_status->status == NULL)    
                        
                        <img src="{{asset('assets/media/svg/other/process.svg')}}" width="90px">
                        <p class="lead">Pembayaran anda sedang dalam proses pemeriksaan oleh panitia</p>
                        <p>Kami akan segera memberitahukan anda, jika pembayaran anda telah kami terima</p>
                        
                        @elseif($payment_status->status == "accepted")
                        
                        <img src="{{asset('assets/media/svg/other/check.svg')}}" width="90px">
                        <p class="lead">Pembayaran anda sudah di setujui</p>
                        <p>Silahkan lanjutkan proses mengisi biodata dan mencetak kartu ujian</p>
                        
                        @elseif($payment_status->status == "rejected")
                        
                        <img src="{{asset('assets/media/svg/other/reject.svg')}}" width="90px">
                        <p class="lead">Maaf kami tidak dapat memverifikasi pembayaran anda.</p>
                        <p>Silahkan hubungi contact person kami untuk info lebih lanjut</p>
                        
                        @elseif($payment_status->status == "refunded")
                        
                        <img src="{{asset('assets/media/svg/other/return.svg')}}" width="90px">
                        <p class="lead">Pembayaran anda sudah kami refund kembali kepada pengirim</p>
                        <p>Silahkan hubungi contact person kami untuk info lebih lanjut</p>
                        
                        @endif
                    </div>
                </div>
                @else
                <form action="{{route('psb.payment-save')}}" method="post" enctype="multipart/form-data" onsubmit="btnSubmit.disabled=true; btnSubmit.innerText ='Processing'; return true;">
                    @csrf
                    <div class="card-body pt-6">
                            <div class="form-group mb-3">
                                <label for="payment_via">Nominal Transfer</label>
                                <input type="text" class="form-control @error('payment_ammount') is-invalid @enderror" name="payment_ammount" id="payment_ammount" required>
                                @error('payment_ammount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="payment_via">Transfer Via</label>
                                <input type="text" class="form-control @error('payment_via') is-invalid @enderror" name="payment_via" id="payment_via" placeholder="Ex: Bank Aceh / Bank BSI" required>
                                @error('payment_via')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="payment_evidence_file">Upload Bukti Transfer</label>
                                <input type="file" class="form-control-file my-pond @error('payment_evidence_file') is-invalid @enderror" name="payment_evidence_file" id="payment_evidence_file" accept="image/*" required>
                                @error('payment_evidence_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
                    </div>
                </form>
                @endif
            @endif
        </div>
    </div>
    @if(auth()->user()->referral_code == NULL)
    <div class="col-md-4">
        <div class="card card-flush">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Payment Information</span>
                </h3>
            </div>
            <div class="card-body pt-6">
                <ol>
                    <li>Lakukan Transfer / Pemindahan Dana Sebesar <b>Rp. 123</b></li>
                    <li>Tujuan Transfer
                        <ul>
                            <li>Bank : Nama Bank</b></li>
                            <li>NoRek : <b>No rek</b></li>
                            <li>A/N : <b>Nama Rek</b></li>
                            <li>Berita : <b>PSB-</b></li>
                        </ul>
                    </li>
                    <li>Simpan Bukti Transfer</li>
                    <li>Lakukan konfirmasi pembayaran dengan cara upload bukti transfer di menu yang telah di sediakan</li>
                    <li>Tunggu hingga anda menerima notifikasi dari kami, bahwa pembayaran telah di terima</li>
                </ol>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@push('foot-script')
<script src="{{asset('assets/js')}}/filepond.min.js"></script>
<script src="{{asset('assets/js')}}/filepond.jquery.js"></script>
<script src="{{asset('assets/js')}}/filepond-plugin-image-preview.js"></script>

<script>
$(function(){
    const inputElement = document.querySelector('.my-pond');
    FilePond.registerPlugin(FilePondPluginImagePreview);
    const pond = FilePond.create(inputElement, {
        storeAsFile: true,
        maxFiles: 1,
        allowBrowse: true,
        allowFileEncode: true,
        labelIdle: 'Drag & Drop your files or <span class="filepond--label-action"> Browse </span><br>Support file : .jpg .jpeg .png<br>Max Size : 500kb'
    });
});
</script>
@endpush
