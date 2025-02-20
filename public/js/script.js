
document.addEventListener("DOMContentLoaded", function(){
    // tabulas filtrēšana
    $('#filter').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.searchable').hide();
        $('.searchable').filter(function () {
            return rex.test($(this).text());
        }).show();
    });
});