$(document).ready(function() {

        $("#submit").click(function() {

            var email = $("#email").val();
            var password = $("#password").val();
            var password_conf = $("#password_conf").val();
            $.ajax({
                type: "POST",
                data: {	
                    register: true,
                    email: email,
                    password: password,
                    password_conf: password_conf
                },
                cache: false,
                success: function(data) {
                    alert(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
            
        });

    });
