function updateSingle(id, type) {
    event.preventDefault();
    switch (type) {
        case 'checkbox':
            $("#" + id + "-ch").prop("disabled", true);
            let check;
            $("#" + id + "-ch").prop("checked") ? check = true : check = false;
            typeCH(id, check);
            break;
        default:
            break;
    }
}

function typeCH(id, check) {
    let url = $("#" + id).attr("data-url");
    let cod = $("#" + id + "-ch").attr("data-cod");
    let atribute = $("#" + id + "-ch").attr("data-atribute");
    let value = $("#" + id + "-ch").attr("data-value");

    $.ajax({
        type: 'POST',
        url: url + "/api/editSingle.php",
        data: {
            cod: cod,
            atribute: atribute,
            value: value
        },
        success: function (data) {
            console.log(data);
            data = JSON.parse(data);
            if (data['status'] == true) {
                value == '1' ? $("#" + id + "-ch").attr("data-value", '0') : $("#" + id + "-ch").attr("data-value", '1');
                setTimeout(() => {
                    $("#" + id + "-ch").prop("disabled", false);
                }, 3000);
            } else {

            }
        }
    });
}