function onSignIn(googleUser) {
    /*var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    */
    //var xhr = new XMLHttpRequest();
    var id_token = googleUser.getAuthResponse().id_token;
    //var crsfToken = document.getElementById("token").value;
    //xhr.open('POST', 'https://yourbackend.example.com/tokensignin');
    /*xhr.open('POST', 'http://localhost/laravel5p3/public/profile/googlesingin');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', crsfToken);
    xhr.send('idtoken=' + id_token);*/
    $.ajax({
        dataType: "json",
        method: 'GET',
        url: 'http://localhost/laravel5p3/public/profile/googlesingin',
        data: {idtoken: id_token},
        success: function (result) {
            // update your page with the result json
            console.log(result);
            $('#name').val(result.name);
            $('#email').val(result.email)
        },
    });
}