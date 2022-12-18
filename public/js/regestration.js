function regestration() {
    $('#newUserSubmit').on('click', function (e) {
        e.preventDefault();
        var userFirstName = $('#userFirstName').val();
        if (userFirstName !== '') {
            $('#userFirstName').removeClass('error-box-fname');
            $('.alert-box-fname').addClass('d-none');
            var userLastName = $('#userLastName').val();
            if (userLastName !== '') {
                $('#userLastName').removeClass('error-box-lname');
                $('.alert-box-lname').addClass('d-none');
                var userEmail = $('#userEmail').val();
                if (userEmail !== '') {
                    $('#userEmail').removeClass('error-box-email2');
                    $('.alert-box-email2').addClass('d-none');
                    var userPhone = $('#userPhone').val();
                    if (userPhone !== '') {
                        $('#userPhone').removeClass('error-box-phn');
                        $('.alert-box-phn').addClass('d-none');
                        var userPassword = $('#userPassword').val();
                        var userRePassword = $('#userRePassword').val();
                        if (userPassword !== '') {
                            $('#userPassword').removeClass('error-box-pwd');
                            $('.alert-box-pwd').addClass('d-none');

                            if (userPassword == userRePassword) {

                                data = {
                                    userFirstName: userFirstName,
                                    userLastName: userLastName,
                                    userEmail: userEmail,
                                    userPhone: userPhone,
                                    userPassword: userPassword
                                };
                                url = '/reg';

                                axios.post(url, data)
                                .then(function (response) {
                                    if (response.data==1) {
                                        location.reload();
                                    } else {
                                        alert('failed1');
                                    }
                                })
                                .catch(function (error) {
                                    alert('failed2');
                                });
                            } else {
                                alert('Passwords must be same');
                            }
                        } else {
                            $('#userPassword').addClass('error-box-pwd');
                            $('.alert-box-pwd').removeClass('d-none');
                        }
                    } else {
                        $('#userPhone').addClass('error-box-phn');
                        $('.alert-box-phn').removeClass('d-none');
                    }
                } else {
                    $('#userEmail').addClass('error-box-email2');
                    $('.alert-box-email2').removeClass('d-none');
                }
            } else {
                $('#userLastName').addClass('error-box-lname');
                $('.alert-box-lname').removeClass('d-none');
            }
        } else {
            $('#userFirstName').addClass('error-box-fname');
            $('.alert-box-fname').removeClass('d-none');
        }
    });
}



function login() {
    $('#oldUserSubmit').on('click', function (e) {
        e.preventDefault();


        var userInputEmail = $('#userInputEmail').val();
        var userInputPassword = $('#userInputPassword').val();

        if (userInputEmail == '' || userInputPassword == '') {
            if (userInputEmail == '') {
                $('#userInputEmail').addClass('error-email');
                $('.alert-box-email').removeClass('d-none');
            } else {
                $('#userInputPassword').addClass('error-password');
                $('.alert-box-password').removeClass('d-none');
            }
        } else {
            data = {
                userInputEmail: userInputEmail,
                userInputPassword: userInputPassword
            };
            url = '/log';

            axios.post(url, data)
            .then(function (response) {
                if (response.data == 1) {
                    location.reload();
                } else {
                    $('#showErrorLogin').removeClass('d-none');
                    $('#showErrorLogin').html("Email or Password is incorrect!");

                    setInterval(function () {
                        $('#showErrorLogin').addClass('d-none');
                    }, 3000);
                }
            })
            .catch(function (error) {
                $('#showErrorLogin').removeClass('d-none');
                $('#showErrorLogin').html("Email or Password is incorrect!");

                setInterval(function () {
                    $('#showErrorLogin').addClass('d-none');
                }, 3000);
            });
        }
    });
}