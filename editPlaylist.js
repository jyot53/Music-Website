$(".editplaylist").on('click', function (e) {
    var dataId = $(this).attr('data-id2'); //id of playlist
    console.log(dataId);
  
    $(".editsubmit").on('click', function (e) {
        console.log("print3");
        var name1 = $('.editname1').val();
        var desc1 = $('.editdesc1').val();
        var file1 = $('.editinputfile1').val();
        console.log(name1);
        console.log(desc1);
        console.log(file1);

        $.ajax({
            url: "editPlaylist.php?title=" + name1+"&description="+desc1+"&file="+file1+"&id="+dataId,
            method: "get",
            success: function (data) {
                alert("Changes Successfully " + data);
            }
        });
    });
});