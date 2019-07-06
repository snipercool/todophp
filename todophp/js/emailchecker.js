$("#email").on("keyup", function(e){
    let email = $("#email").val();
    console.log(email);
    $.ajax({
        method: "POST",
        url: "ajax/emailchecker.php",
        data: { email: email},
        dataType:'json'
    })
        .done(function( res ) {
            if(res.status =="success"){
                let check = $("#mailcheck");
                check.css("display", "block");
            } else {
                let check = $("#mailcheck2");
                check.css("display", "block");
            }
        });
    e.preventDefault();
});