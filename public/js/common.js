$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});
$(document).ready(function(){
    $(document).on('click', '.action_btn', function(){
        var type    = $(this).data('atype');
        var curid   = $(this).data('curid');
        var email   = $.trim($(this).data('email'));
        $.ajax({
            url: $.trim($('#actionUrl').val()),
            type: "POST",
            async:false,
            dataType: "json",
            data: { curid: curid, type:type, email:email },
            'beforeSend': function(request) {
            },
            success: function(data) {
                if(data.status !=""){
                    $('#divalert').addClass('alert-'+data.status).removeClass('d-none').html(data.msg);
                    setTimeout(function() {
                        $('#divalert').addClass('d-none').html('');
                    }, 2000);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert('Something went wrong.')
            }
        });            
    });
});