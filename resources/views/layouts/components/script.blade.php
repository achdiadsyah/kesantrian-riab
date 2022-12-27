<script>var hostUrl = "{{asset('assets/')}}";</script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="{{asset('assets/js/costum.js')}}"></script>

@if(session('msg'))
<script>
    Swal.fire({
        text: "{{ session('msg') }}",
        icon: "{{ session('icon')?session('icon'):info }}",
        buttonsStyling: false,
        confirmButtonText: "Ok",
        customClass: {
            confirmButton: "btn btn-{{session('confirmButtonColor')?session('confirmButtonColor'):info}}"
        }
    });
</script>
@endif

@stack('foot-script')