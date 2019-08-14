$("#createlist").on("click", function(e){
    let list = $("#listname").val();
    let user = $("#listname").data("index");
    //console.log(list);
    $.ajax({
        method: "POST",
        url: "ajax/createlist.php",
        data: { list: list, user: user},
        dataType:'json'
    })
        .done(function( res ) {
            if(res.status =="success"){
                console.log('list created');

            } else {
                console.log('list created failed');
            }
        });
});