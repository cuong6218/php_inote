<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input type="text" name="name" value="<?php echo $type['name'] ?>" placeholder="type name" />
        <input type="text" name="desc" value="<?php echo $type['description'] ?>" placeholder="type description" />
        <button type="submit">Update Type</button>
    </form>
</body>

</html>