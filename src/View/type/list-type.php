<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br />
    <form method="post">
        <input type="text" name="keyword" placeholder="keyword" />
        <button type="submit">Search</button>
    </form>
    <a href="index.php?page=add-type">Add type</a>
    <table>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
        <?php if (empty($types)) : ?>
            <tr>
                <td>No data</td>
            </tr>
        <?php else : ?>
            <?php foreach ($types as $key => $type) : ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $type->getName() ?></td>
                    <td><?php echo $type->getDesc() ?></td>
                    <td><a href="index.php?page=update-type&id=<?php echo $type->getId() ?>">Update</a> </td>
                    <td><a href="index.php?page=delete-type&id=<?php echo $type->getId() ?>">Delete</a> </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>

</html>