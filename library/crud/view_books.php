<?php
require_once __DIR__ . "/../backend/books.php";
$bookObj = new Book();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="This is an example of a crud in php">
    <title>Library | View Book</title>
    <link rel="stylesheet" href="css/common.css"> 
    <link rel="stylesheet" href="css/views_books.css">
</head>
<body>
    <h1>List of the Books</h1>
    <button><a href="add_books.php">Add Book</a></button>
    <table border="1">
            <tr>
                <th>Book Title<th>
                <th>Book Author<th>
                <th>Book Genre<th>
                <th>Book's Publication Year<th>
            </tr>
            <?php
            foreach($bookObj->viewBook() as $book){
            ?>
            <tr>
                <td><?= $book['book_title']; ?></td>
                <td><?= $book['book_author']; ?></td>
                <td><?= $book['genre']; ?></td>
                <td><?= $book['publication_year']; ?></td>
            </tr>
        <?php    
        }
        ?>
    </table>
</body>
</html>