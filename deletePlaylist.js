
    $(".deletePlaylist").on('click', function (e) {
        console.log("in modal delete");
        var dataId1 = $(this).attr('data-id1'); //userid not in use currently
        var dataId2 = $(this).attr('data-id2'); //playlistid
        console.log(dataId1);
        console.log(dataId2);
        console.log("print1");
        $(".delesubmit").on('click', function (e) {
            console.log("print3");
            
            $.ajax({
                url: "deletePlaylist.php?id="+dataId2,
                method: "get",
                success: function (data) {
                    alert("Playlist Deleted Successfully " + data);
                }
            });
        });
    });





