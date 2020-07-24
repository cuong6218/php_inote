<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input type="text" name="title" value="<?php echo $note['title']; ?>" placeholder="title" />
        <input type="text" name="content" value="<?php echo $note['content']; ?>" placeholder="content" />
        <select name="type_id">
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type->getId(); ?>"><?php echo $type->getName(); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Update Note</button>
    </form>
</body>

</html>