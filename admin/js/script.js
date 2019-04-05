$('table').addClass("table-hover");
$('input[type=text]').addClass("form-control");
$('input[type=date]').addClass("form-control");
$('input[type=url]').addClass("form-control");
$('input[type=number]').addClass("form-control");
$('select').addClass("form-control");
$('textarea').addClass("form-control");
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
})
$('.btn-danger').on("click", function (e) {
    e.preventDefault();
    var choice = confirm("¿Estás seguro de eliminar?");
    if (choice) {
        window.location.href = $(this).attr('href');
    }
});
$(".ckeditorTextarea").each(function () {
    CKEDITOR.replace(this, {
        customConfig: 'config.js',
        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
});
$(document).ready(function () {
    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("table tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});



$('th').click(function(){
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc){rows = rows.reverse()}
    for (var i = 0; i < rows.length; i++){table.append(rows[i])}
})
function comparer(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
    }
}
function getCellValue(row, index){ return $(row).children('td').eq(index).text() }

