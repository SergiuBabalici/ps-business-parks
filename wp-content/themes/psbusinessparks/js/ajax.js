$('html').on("keyup", ".input_step1", function() {
    $('.input_step2').attr( 'value', ($(this).val()));
});


$('html').on("click", ".find-park-btn", function() {

    var search = $('.input_step2').val();

    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        type: 'post',
        data: {
            'action':'scheduler_ajax_request',
            'search' : search
        },
        success:function(data) {
            $(".search-results").html(data);
        },
        error: function(errorThrown){
            alert ("Error loading Parks list.")
        }
    });

});