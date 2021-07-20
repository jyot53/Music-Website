<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playing Song</title>
</head>
<body>
    <audio controls>
        <source src="<?php echo $_GET['name']; ?>" type="audio/mpeg"></source>
    </audio>

    <a href="index.php">Home</a>

</body>
</html>