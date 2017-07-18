<?php
class Core{
    public function __construct($db){
        $this->db = $db;
    }

    public function loggedin(){
        if (isset($_SESSION['id']) && isset($_SESSION['71a16ed2d4c0531acf76af5a793a0638'])){
            return true;
        }
        return false;
    }

    public function login($username, $password){
        $query = $this->db->prepare("SELECT * FROM users WHERE username=:u AND password=:p");
        $query->execute(array(
            ':u'=>$username,
            ':p'=>$password
        ));

        if ($query->rowCount() > 0){
            $_SESSION['id'] = $query->fetch(PDO::FETCH_OBJ)->id;
            $_SESSION['71a16ed2d4c0531acf76af5a793a0638'] = "true";

            return true;
        }

        return false;
    }

    public function getUserByID($id){
        $query = $this->db->prepare("SELECT id,username,admin FROM users WHERE id=:id");
        $query->execute(array(
            ':id'=>$id
        ));

        if ($query->rowCount() > 0){
            return $query->fetch(PDO::FETCH_OBJ);
        }
    }

    public function getArticles(){
        $articles = array();
        $query = $this->db->query("SELECT * FROM articles WHERE deleted=0");
        if ($query->rowCount() > 0){
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                $article = new Article($row->id, $row->title, $row->text, $this->getUserByID($row->author_id)->username, $row->date);
                array_push($articles, $article);
            }
        }

        return $articles;
    }

    public function getArticle($id){
        $query = $this->db->prepare("SELECT * FROM articles WHERE id=:id AND deleted=0");
        $query->execute(array(
            ':id'=>$id
        ));

        if ($query->rowCount() > 0){
            return $query->fetch(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }
}
?>