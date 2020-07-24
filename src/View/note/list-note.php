<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br />
    <a href="index.php?page=add-note">Add note</a>
    <table>
        <tr>
            <th>STT</th>
            <th>Title</th>
            <th>Content</th>
            <th colspan="2">Action</th>
        </tr>
        <?php if (empty($notes)) : ?>
            <tr>
                <td>No data</td>
            </tr>
        <?php else : ?>
            <?php foreach ($notes as $key => $note) : ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $note->getTitle(); ?></td>
                    <td><?php echo $note->getContent(); ?></td>
                    <td><a href="index.php?page=update-note&id=<?php echo $note->getId(); ?>">Update</a></td>
                    <td><a href="index.php?page=delete-note&id=<?php echo $note->getId(); ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

</body>

</html>