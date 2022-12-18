$(document).ready(function(){
    $('#list-icon').on('click',()=>{
        $('.right-items-single-card').addClass('list-view')
        $('#grid-icon').removeClass('active-icon');
        $('#list-icon').addClass('active-icon');
        // $(".right-items-single-card").attr("data-aos","fade-up");
    });
    $('#grid-icon').on('click',()=>{
        $('.right-items-single-card').removeClass('list-view')
        $('#grid-icon').addClass('active-icon');
        $('#list-icon').removeClass('active-icon');
    });
    $('#cart-total-collapse').on('click',()=>{
        $('.before-click').toggleClass('collapseClass');
    });



    $('#entrCupn').on('click',function(){
        $('.open-that-coupon-h0').toggleClass('h-auto');
    });



    $('#checkBoxOpen').on('click',()=>{
        var check = $('#check');

        $('#addTogg').toggleClass('actTogg');
        
        $("#check").prop("checked", !check.prop("checked"));
    });

    $('#res-prokashoni').on('click',()=>{
        $('#Modal-prokashoni').modal('show')
    });
    $('#res-lekhok').on('click',()=>{
        $('#Modal-lekhok').modal('show')
    });
    $('#res-bishoy').on('click',()=>{
        $('#Modal-bishoy').modal('show')
    });

});