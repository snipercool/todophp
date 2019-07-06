$("#username").on("keyup", function(e){
    let username = $("#username").val();
    console.log(username);
    $.ajax({
        method: "POST",
        url: "ajax/check_username.php",
        data: { username: username},
        dataType:'json'
    })
        .done(function( res ) {
            if(res.status =="success"){
                let check = $("#usercheck");
                check.css("display", "block");
            } else {
                let check = $("#usercheck2");
                check.css("display", "block");
            }
        });
    e.preventDefault();
});