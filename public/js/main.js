
$(document).ready(function () {
    //peticiones buscador
    if(document.getElementById('selectOrderBrands')){
        document.getElementById('selectOrderBrands').addEventListener('change', function () {
            document.getElementById('formOrderBrands').submit();
        });
    }
    if (document.getElementById('buscadorAdminBrands') || 
            document.getElementById('buscadorAdminProducts') || 
            document.getElementById('buscadorAdminUsers')){
        document.getElementById('buscadorAdminBrands').addEventListener('keyup', function () {
            var txt = this.value.toLowerCase();
            searchAdminPanel('tableBrands', 1, txt);
        });
        document.getElementById('buscadorAdminProducts').addEventListener('keyup', function () {
            var txt = this.value.toLowerCase();
            searchAdminPanel('tableProducts', 2, txt);
        });
        document.getElementById('buscadorAdminUsers').addEventListener('keyup', function () {
            var txt = this.value.toLowerCase();
            searchAdminPanel('tableUsers', 1, txt);
        });
    }


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

function searchAdminPanel(nameTable, posSearch, txt) {
    var table = document.getElementById(nameTable);
    var tr = table.children[1].children;//referencia al tbody
    Array.prototype.forEach.call(tr, function (td) {
        var nameSearch = td.children[posSearch].innerText.toLowerCase();
        td.style.display = (nameSearch.indexOf(txt) > -1) ? 'table-row' : 'none';
    });
}


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
                    p = document.createElement('p');
                p.textContent = e.name;
                div.appendChild(p);
                $('#resultSearch').append(div);
            });

        },
    });
}