$('.rate-btn').hover(function(){
    $('.rate-btn').removeClass('rate-btn-hover');
    window.therate = $(this).attr('id');
    for (var i = window.therate; i >= 0; i--) {
        $('.rate-btn-'+i).addClass('rate-btn-hover');
    }
});

$('#add_comment').click(function(){
    $('.insert-rating-wrap').slideDown();
    $('#show_comment').removeClass('active_comment');
    $('#add_comment').addClass('active_comment');
    $('#sortable').slideUp();
});
$('#show_comment').click(function(){
    $('#sortable').slideDown();
    $('#add_comment').removeClass('active_comment');
    $('#show_comment').addClass('active_comment');
    $('.insert-rating-wrap').slideUp();
});


$('.rate-submit').click(function(e){
    e.preventDefault();
   /* var therate = $('.rate-ex1-cnt .rate-btn-hover:last-child').attr('id');*/
    if(typeof window.therate == 'undefined'){
        window.therate = 1;
    }
    var hotspot = $('#hotspot').val();
    var deal = $('#deal').val();
    var user = $('#commentUser').val();
    var text = $('#commentText').val();
    if(user == '' || text == ''){
        $('.error').show();

    } else {
        var dataRate = 'deal='+deal+'&hotspot='+hotspot+'&user='+user+'&text='+text+'&rate='+window.therate;
        $('.rate-btn').removeClass('rate-btn-active');
        for (var i = therate; i >= 0; i--) {
            $('.rate-btn-'+i).addClass('rate-btn-active');
        };
        $.ajax({
            type : "POST",
            url : "/wivert/comments",  //change it with your own adress to the code
            data: dataRate,
            success:function(response){
                $("#success").show();
                $("#sortable").html(response);
            }
        });
    }
});