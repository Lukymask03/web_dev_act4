<?php
require_once __DIR__ . "/../backend/books.php";
$bookObj = new Book();

$book = ["book_title"=>"","book_author"=>"","genre"=>"","publication_year"=>""];
$errors = ["book_title"=>"","book_author"=>"","genre"=>"","publication_year"=>""];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $book["book_title"] = trim(htmlspecialchars($_POST["book_title"]));
    $book["book_author"] = trim(htmlspecialchars($_POST["book_author"]));
    $book["genre"] = trim(htmlspecialchars($_POST["genre"]));
    $book["publication_year"] = trim(htmlspecialchars($_POST["publication_year"]));

    if(empty($book["book_title"])){
        $error["book_title"] = "Book Title is required";
    }

    if(empty($book["book_author"])){
        $error["book_author"] = "Book Author is required";
    }

    if(empty($book["genre"])){
        $error["genre"] = "Book genre is required"; 
    }

    if(empty($book["publication_year"])){
        $error["publication_year"] = "Book's Publication Year is required";
   }

   if(empty(array_filter($errors))){
      $bookObj->book_title = $book["book_title"];
      $bookObj->book_author = $book["book_author"];
      $bookObj->genre = $book["genre"];
      $bookObj->publication_year = $book["publication_year"];

    if($bookObj->addBook()){
        header("Location: view_books.php");
    }else{
        echo "faild";
    }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="This is an example crud in php">
    <title>LIBRARY | ADD BOOK</title>
    <link rel="stylesheet" href="css/common.css"> 
    <link rel="stylesheet" href="css/add_books.css">
</head>
<body>
    <h1>Add Book</h1>
    <br>
    <label for="">Field with <span>*</span> is required</label>
    <br>
    <br>
    <form for="">
        <label for="book_title">Book Title <span>*</span></label>
        <input type="varchar" name="book_title" id="book_title" value="<?=$book["book_title"]?>">
        <p class="error"><?= $errors["book_title"]?></p>
        <br>
        <br>
        <label for="book_author">Book Author <span>*</span></label>
        <input type="varchar" name="book_author" id="book_auithor" value="<?=$book["book_author"]?>">
        <br>
        <br>
        <p class="error"><?= $errors["book_author"]?></p>
        <label for="genre"> Gender
            <select name="gender">
                <option value="">--Select Gender--</option>
                <option value="fiction">-- Fiction --</option>
                <option value="history">-- History --</option>
                <option value="science">-- Science --</option>
            </select>
        <br>
        <br>
        <br>
        <label for="publication_year"> Year Publication</label>
        <input type="integer" name="publication_year" id="publication_yaer" value="<?=$book["publication_year"]?>">
        <br>
        <br>
        <br>
        <button type="submit">Save Book</button>    
    </form>
</body>
</html>