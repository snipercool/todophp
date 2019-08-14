$("#createtask").on("click", function(e){
    let task = $("#taskname").val();
    let list = $("#taskname").data("index");
    let time = $("#time").val();
    let date = $("#enddate").val();
    console.log(task);
    console.log(time);
    console.log(date);
    $.ajax({
        method: "POST",
        url: "ajax/createtask.php",
        data: { task: task, list: list, time: time, date, date},
        dataType:'json'
    })
        .done(function( res ) {
            if(res.status =="success"){
                console.log('task created');
                
            } else {
                console.log('task created failed');
                
                
            }
        });
    
});