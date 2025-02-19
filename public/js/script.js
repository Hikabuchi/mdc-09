
$('#series').on('change', function (e) {
    let id = $('#series').val();
    $.get('/series/'+id+'/json', function (r) {
        $("#player").html(r.video);
    }, );
    $.get('/series/'+id+'/json', function (r) {
        $("#serie_num").html(r.number+' "'+r.title+'"');
    }, );
});

$(document).ready(function() {
    $('.sel2').select2();
})

$('.clonerole').on('click',function () {
    $('.aroles').append(
        $('.arole').eq(0).clone()
    );
});

$(function () {
    $('.del').on('click', function () {
        return confirm("Удалить ?");
    });
});

$('.arole').on('click', '.del-role', function (){
    $(this).parent().remove();
    return false;
})

$('.arole').on('click', '.del-role-create', function (){
    $(this).parent().remove();
    return false;
})
