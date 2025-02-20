
document.addEventListener("DOMContentLoaded", function(){
    let params = new window.URLSearchParams(window.location.search);
    params.has('sort') &&  params.get('sort') !== '' ? $("#sorting_select > option[value=" + params.get('sort') + "]").attr("selected", true) : '';

    // grāmatu filtrēšana
    $('#filter').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.searchable').hide();
        $('.searchable').filter(function () {
            return rex.test($(this).text());
        }).show();
    });

    $('#sorting_select').on( "change", function() {
        this.form.submit();
      } );
});