function formatDate(date) {
    var d = new Date(date);
    var month = '' + (d.getMonth() + 1);
    var day = '' + d.getDate();
    var year = d.getFullYear();
    switch (month) {
        case '1':
            month = "Jan";
            break;
        case '2':
            month = "Feb";
            break;
        case '3':
            month = "Mar";
            break;
        case '4':
            month = "Apr";
            break;
        case '5':
            month = "Mei";
            break;
        case '6':
            month = "Jun";
            break;
        case '7':
            month = "Jul";
            break;
        case '8':
            month = "Aug";
            break;
        case '9':
            month = "Sep";
            break;
        case '10':
            month = "Okt";
            break;
        case '11':
            month = "Nov";
            break;
        case '12':
            month = "Des";
            break;
    }

    if (day.length < 2) {
        day = '0' + day;
    }

    return [day, month, year].join('-');
}

function capitalize(s) {
    return s[0].toUpperCase() + s.slice(1);
}


function reloadTable() {
    $('#dataTable').DataTable().ajax.reload();
}

function myAlert(msg, icon, confirmButtonColor) {
    Swal.fire({
        text: msg,
        icon: icon ? icon : 'info',
        buttonsStyling: false,
        confirmButtonText: "Ok",
        customClass: {
            confirmButton: `btn btn-${confirmButtonColor ? confirmButtonColor : 'info'}`
        }
    });
}