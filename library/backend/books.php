<?php
require_once "database.php";

class Book{
    public $book_id = "";
    public $book_title = "";
    public $book_author = "";
    public $genre = "";
    public $publication_year = "";

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addBook(){
        $sql = "INSERT INTO books(book_title, book_author, genre, publication_year) VALUE(:book_title, :book_author, :genre, :publication_year)";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(":book_title", $this->book_title);
        $query->bindParam(":book_author", $this->book_author);
        $query->bindParam(":genre", $this->genre);
        $query->bindParam(":publication_year", $this->publication_year);

        return $query->execute();
    }
    public function viewBook(){
        $sql = "SELECT * FROM books ORDER BY book_title ASC";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()){
            return $query->fetchAll();
        }else{
            return null;
        }
    }
}