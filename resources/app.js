$(document).ready(function() {

    $("#register").click(function() {

        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var password_Confirm = $("#password_Confirm").val();
        var groupName = $("#groupName").val();
        var groupValue = $("#groupValue").val();


        $.ajax({
            type: "POST",
            data: {	
                registerJ: true,
                name: name,
                email: email,
                password: password,
                password_Confirm: password_Confirm,
                groupName: groupName,
                groupValue: groupValue,
            },
            success: function(data) {
                if (data != ''){
                alert(data);}
                else{
                    
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
        
    });

});