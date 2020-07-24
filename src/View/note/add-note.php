<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <fieldset>
        <legend>Thêm ghi chú</legend>
        <form method="post">
            <p1>Chủ đề: </p1>
            <input type="text" name="title" placeholder="title" />
            <p1>Nội dung: </p1>
            <input type="text" name="content" placeholder="content" />
            <p1>Chọn loại việc: </p1>
            <select name="type_id">
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type->getId(); ?>"><?php echo $type->getName(); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Add Note</button>
        </form>
    </fieldset>

</body>

</html>