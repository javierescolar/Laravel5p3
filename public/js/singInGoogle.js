function start() {
    gapi.load('auth2', function () {
        auth2 = gapi.auth2.init({
            client_id: '6077178310-0j9tpids8iqqpgpc5r6bqio17mhn04ip.apps.googleusercontent.com',
            // Scopes to request in addition to 'profile' and 'email'
            //scope: 'https://www.googleapis.com/auth/userinfo.profile'
        });
    });
}

function signInCallback(authResult) {
    if (authResult['code']) {

        // Hide the sign-in button now that the user is authorized, for example:
       // $('#signinButton').attr('style', 'display: none');

        $.ajax({
            dataType: "json",
            method: 'GET',
            url: 'http://localhost/laravel5p3/public/profile/googlesingin',
            data: {code: authResult['code']},
            success: function (result) {
                // update your page with the result json
                console.log(result);
                $('#name').val(result.name);
                $('#email').val(result.email)
            },
        });
    } else {
        // There was an error.
    }
}
       