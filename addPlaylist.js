$("#manage_playlist").on('click', function (e) {
    var dataId = $(this).attr('data-id');
    console.log(dataId);
    console.log("print1");
    $("#addsubmit").on('click', function (e) {
        console.log("print3");
        var name1 = $('#addname1').val();
        var desc1 = $('#adddesc1').val();
        var file1 = $('#addinputfile1').val();
        console.log(name1);
        console.log(desc1);
        console.log("print2");
       
        if (file1 == "") {
            file1 = "https://images.pexels.com/photos/838702/pexels-photo-838702.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";
        }
        console.log(file1);
        $.ajax({
            url: "addNewPlaylist.php?username=" + dataId,
            method: "get",
            data: {
                name: name1,
                desc: desc1,
                file: file1
            },
            success: function (data) {
                alert("New Playlist Added Successfully " + data);
            }
        });
    });
});
