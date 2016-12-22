
$(document).ready(function () {
    //peticiones buscador

    document.getElementById('buscadorAdminBrands').addEventListener('keyup', function () {
        var txt = this.value;
        var table = document.getElementById('tableBrands');
        Array.prototype.forEach.call(table.children[1].children, function (e) {
            console.log(e.children[1].children.nodeValue);
                if (e.style.display == 'none') {
                    e.style.display = 'table-row';
                } else {
                    e.style.display = 'none';
                }
            
        })
    });

    $('#search').keyup(function () {
        var txt = $(this).val();
        $('#resultSearch').html("");
        if (txt.length > 0) {
            seachAJAX(txt);
        }
    });
    //Ocultar mostrar barra buscador
    $("#buttonSearch").click(function () {
        $("#search").fadeToggle();
        $('#resultSearch').fadeToggle();
    });

    $('[data-toggle=collapse]').click(function () {
        // toggle icon
        $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
    });

    $("#botonBrands").click(function () {
        $("#contentTableBrands").show();
        $("#contentTableProducts").hide();
        $("#contentTableUsers").hide();
    });
    $("#botonProducts").click(function () {
        $("#contentTableBrands").hide();
        $("#contentTableProducts").show();
        $("#contentTableUsers").hide();
    });
    $("#botonUsers").click(function () {
        $("#contentTableBrands").hide();
        $("#contentTableProducts").hide();
        $("#contentTableUsers").show();
    });

});

function seachAJAX(search) {
    var urlProject = window.location.host;
    $.ajax({
        dataType: "json",
        method: 'GET',
        url: '/search',
        data: {keyword: search},
        success: function (result) {
            // update your page with the result json
            console.log(result);
            result.forEach(function (e) {
                var div = document.createElement('div'),
                        img = document.createElement('img'),
                        p = document.createElement('p');
                img.setAttribute('src', window.location.protocol + '//' + urlProject + '/img/' + e.image);
                p.textContent = e.name;
                div.appendChild(img);
                div.appendChild(p);
                $('#resultSearch').append(div);
            });

        },
    });
}