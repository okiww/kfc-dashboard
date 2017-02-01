// Init App
var App = {
    tooltip: function () {
        $('.bs-tooltip, [title], [data-title]').tooltip();
    },
    // iCheck: function () {
    //     $('.icheck input[type="checkbox"], .icheck input[type="radio"]').iCheck({
    //         checkboxClass: 'icheckbox_square-blue',
    //         radioClass: 'iradio_square-blue',
    //         increaseArea: '20%'
    //     });
    // },
    // datetimepicker: function () {
    //     var format = 'YYYY-MM-DD';
    //     var date = new Date();
    //     date.setFullYear(date.getFullYear() - 10);
    //     var maxBirthDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);

    //     $('.datetimepicker').datetimepicker({
    //         format: format,
    //     });

    //     $('.datetimepicker-monthly').datetimepicker({
    //         viewMode: "months",
    //         format: 'YYYY-MM',
    //     });

    //     $('.datetimepicker-birthdate').datetimepicker({
    //         format: format,
    //         maxDate: maxBirthDate,
    //     });

    //     $('.daterangepicker').daterangepicker({
    //         locale: {
    //           format: 'YYYY-MM-DD'
    //         },
    //     });
    // },
//     select2: function () {
//         $('.select2').select2({
//             placeholder: function () {
//                 $(this).data('placeholder');
//             },
//             allowClear: true
//         });
//     },
//     dataMask: function () {
//         $('[data-mask]').inputmask({'removeMaskOnSubmit':true});
//     },
//     flashNotification: function() {
//         $('#flash-overlay-modal').modal();
//         $('#alert-flash-notification').not('.alert-important').fadeIn(1000).delay(5000).fadeOut(1000);
//         $('#alert-flash-notification.alert-important').fadeIn(1000);
//     },
//     uploadImage: function() {
//         $(document).on('change', '.upload-file', function () {
//             var elemImg = $(this).parent().find('.upload-thumbnail');
            
//             call.readerImageURL(this, elemImg);
//             elemImg.css('height', 'auto');
//         });

//         $(document).on('click', '.upload-thumbnail', function () {
//             $(this).parent().find('.upload-file').click();
//         });

//         $(document).on('click', '.upload-remove', function () {
//             $(this).parent().find('.upload-file').val('');
//             $(this).parent().find('.upload-thumbnail').attr('src', '');
//             Holder.run({
//                 image: $(this).parent().find('.upload-thumbnail')
//             });
//         });
//     },
//     inputNumber: function() {
//         $('input[type="number"]').keydown(function (e) {
//             // Allow: backspace, delete, tab, escape, enter and .
//                      console.log(e.keyCode);
//             if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 39]) !== -1 ||
//                  // Allow: Ctrl+A, Command+A
//                 (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
//                  // Allow: home, end, left, right, down, up
//                 (e.keyCode >= 35 && e.keyCode <= 37)) {
//                      // let it happen, don't do anything
//                      return;
                     
//             }
            
//             // Ensure that it is a number and stop the keypress
//             if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
//                 e.preventDefault();
//             }
//         });
//     }
// }
// // Init Call Function
// var call = {
//     modalDelete: function (button) {
//         $(button).on('click', function (e) {
//             var action = $(this).data('action');
//             var href = $(this).data('href');
//             var id = $(this).data('id');

//             $.ajax({
//                 url: href,
//                 type: 'GET',
//                 dataType: 'HTML',
//                 data: {'id': id},
//                 success: function (response) {
//                     $('#modal-confirm-delete').find('#data-confirm-delete').html(response);
//                 }
//             });

//             $('#modal-confirm-delete').find('#form-confirm-delete').attr('action', action);
//             $('#modal-confirm-delete').modal('show');

//             e.preventDefault();
//         });
//     },
//     modalDetail: function (button) {
//         $(button).on('click', function (e) {
//             var href = $(this).data('href');
//             var id = $(this).data('id');

//             $.ajax({
//                 url: href,
//                 type: 'GET',
//                 dataType: 'HTML',
//                 data: {'id': id},
//                 success: function (response) {
//                     $('#modal-show-detail').find('#data-show-detail').html(response);
//                 }
//             });

//             $('#modal-show-detail').modal('show');

//             e.preventDefault();
//         });
//     },
//     readerImageURL: function (input, image) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 $(image)
//                     .attr('src', e.target.result);
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     },
}

String.prototype.capitalizeFirstLetter = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

String.prototype.toUpperCaseWords = function () {
    return this.replace(/\w+/g, function(a){ 
        return a.charAt(0).toUpperCase() + a.slice(1).toLowerCase()
    })
}

String.prototype.toUpperCaseFirst = function () {
    return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase()
}

var table;

function dataTablesIndex() {
    table.on('order.dt search.dt', function() {
        var pageIndex = table.page() * table.page.len();
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = pageIndex + i + 1;
        });
    }).draw();
}

$(function () {
    App.tooltip();
    // App.iCheck();
    // App.datetimepicker();
    // App.select2();
    // App.dataMask();
    // App.flashNotification();
    // App.uploadImage();
    // App.inputNumber();
});

if($('input[name="_token"]').length){
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });
}

$('#clear-notif').on('click', function(){

    $.ajax({
        url: "/clear-notification",
        type: "POST",
        success: function(){
                $('.menu').removeClass('.ticket_notif');
            },
            timeout:10000
    });

    location.reload();
});