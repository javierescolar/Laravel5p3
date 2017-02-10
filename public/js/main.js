
$(document).ready(function () {
    //peticiones buscador
    if (document.getElementById('selectOrderBrands')) {
        document.getElementById('selectOrderBrands').addEventListener('change', function () {
            document.getElementById('formOrderBrands').submit();
        });
    }
    if (document.getElementById('buscadorAdminBrands')) {
        document.getElementById('buscadorAdminBrands').addEventListener('keyup', function () {
            var txt = this.value.toLowerCase();
            searchAdminPanel('tableBrands', 1, txt);
        });
    }
    if (document.getElementById('buscadorAdminUsers')) {
        document.getElementById('buscadorAdminUsers').addEventListener('keyup', function () {
            var txt = this.value.toLowerCase();
            searchAdminPanel('tableUsers', 1, txt);
        });
    }
    if (document.getElementById('buscadorAdminProducts')) {
        document.getElementById('buscadorAdminProducts').addEventListener('keyup', function () {
            var txt = this.value.toLowerCase();
            searchAdminPanel('tableProducts', 2, txt);
        });
    }
    var numInputImage = 1;
    if (document.getElementById('addImageForm')) {
        document.getElementById('addImageForm').addEventListener('click', function () {
            var form = document.getElementById('formImages'),
                    div_form_group = document.createElement('div'),
                    div_input_file = document.createElement('div'),
                    div_input_offer = document.createElement('div'),
                    div_input_carrusel = document.createElement('div'),
                    div_input_gallery = document.createElement('div'),
                    inputFile = document.createElement('input'),
                    labelFile = document.createElement('label'),
                    inputOffer = document.createElement('input'),
                    labelOffer = document.createElement('label'),
                    inputCarrusel = document.createElement('input'),
                    labelCarrusel = document.createElement('label'),
                    inputGallery = document.createElement('input'),
                    labelGallery = document.createElement('label');

            div_form_group.setAttribute('class', 'col-md-12');
            div_input_file.setAttribute('class', 'col-md-6');
            div_input_offer.setAttribute('class', 'col-md-2');
            div_input_carrusel.setAttribute('class', 'col-md-2');
            div_input_gallery.setAttribute('class', 'col-md-2');
            //Input File
            inputFile.setAttribute('type', 'file');
            inputFile.setAttribute('name', 'image[' + numInputImage + ']');
            inputFile.setAttribute('class', 'form-control');
            inputFile.setAttribute('required', 'true');
            labelFile.textContent = "Image-" + (numInputImage + 1);
            div_input_file.appendChild(labelFile);
            div_input_file.appendChild(inputFile);
            //input Offer
            inputOffer.setAttribute('type', 'checkbox');
            inputOffer.setAttribute('name', 'offer[' + numInputImage + ']');
            inputOffer.setAttribute('class', 'form-control');
            labelOffer.textContent = "Offer?";
            div_input_offer.appendChild(labelOffer);
            div_input_offer.appendChild(inputOffer);
            //input Carrusel
            inputCarrusel.setAttribute('type', 'checkbox');
            inputCarrusel.setAttribute('name', 'carrusel[' + numInputImage + ']');
            inputCarrusel.setAttribute('class', 'form-control');
            labelCarrusel.textContent = "Carrusel?";
            div_input_carrusel.appendChild(labelCarrusel);
            div_input_carrusel.appendChild(inputCarrusel);
            //input Gallery
            inputGallery.setAttribute('type', 'checkbox');
            inputGallery.setAttribute('name', 'gallery[' + numInputImage + ']');
            inputGallery.setAttribute('class', 'form-control');
            labelGallery.textContent = "Gallery?";
            div_input_gallery.appendChild(labelGallery);
            div_input_gallery.appendChild(inputGallery);

            //Add Input abd divs 
            div_form_group.appendChild(div_input_file);
            div_form_group.appendChild(div_input_offer);
            div_form_group.appendChild(div_input_carrusel);
            div_form_group.appendChild(div_input_gallery);
            form.appendChild(div_form_group);
            //aumento la imagen nueva
            numInputImage++;
        });
    }

    if ($('.flash')) {
        $('.flash').delay(2000).fadeOut();
    }
    $('#search').keyup(function () {
        var txt = $(this).val();
        $('#resultSearch').html("");
        if (txt.length > 0) {
            seachAJAX(txt);
        }
    });
    
    $('#searchButton').click(function () {
        var brandSelected = $('#brandSelected').val(),
        priceMin = ($('#priceMin').val() == "")?"0":$('#priceMin').val(),
        priceMax = ($('#priceMax').val() == "")?"9999":$('#priceMax').val(),
        discount = $('#checkDiscount').is(':checked');
        
        $('#resultSearch').html("");
        
        seachAdvanceAJAX(brandSelected,priceMin,priceMax,discount);  
         
        $('#advOption').hide();
        $('#resultSearch').show();
    });
    
    //Ocultar mostrar barra buscador
    $("#buttonSearch").click(function () {
        $("#search").fadeToggle();
        if($('#search').css('display') == 'none'){
            $('#resultSearch').show();
        } else {
            $('#resultSearch').hide();
        }
        //$('#resultSearch').fadeToggle();
        $('#advSearch').fadeToggle();
        $('#advOption').hide();
        
    });
    $("#advSearch").click(function () {
        $('#advOption').fadeToggle();
        $('#resultSearch').fadeToggle();
    });

    $('[data-toggle=collapse]').click(function () {
        // toggle icon
        $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
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
        url: 'http://localhost/laravel5p3/public/search',
        data: {keyword: search},
        success: function (result) {
            // update your page with the result json
            console.log(result);
            result.forEach(function (e) {
                var urlProduct = 'http://localhost/laravel5p3/public/brands/'+e.product.brand.slug+'/products/'+e.product.slug;
                var div = document.createElement('div'),
                    a = document.createElement('a');
                a.setAttribute('href',urlProduct);
                a.textContent = e.product.name;
                div.appendChild(a);
                $('#resultSearch').append(div);
            });

        },
    });
}

function seachAdvanceAJAX(brandSelected,priceMin,priceMax,discount) {
    var urlProject = window.location.host;
    $.ajax({
        dataType: "json",
        method: 'GET',
        url: 'http://localhost/laravel5p3/public/searchAdvance',
        data: {brandSelected:brandSelected,priceMin:priceMin,priceMax:priceMax,discount:discount},
        success: function (result) {
            // update your page with the result json
            console.log(result);
            result.forEach(function (e) {
                var urlProduct = 'http://localhost/laravel5p3/public/brands/'+e.product.brand.slug+'/products/'+e.product.slug;
                var div = document.createElement('div'),
                    a = document.createElement('a');
                a.setAttribute('href',urlProduct);
                a.textContent = e.product.name;
                div.appendChild(a);
                $('#resultSearch').append(div);
            });

        },
    });
}



