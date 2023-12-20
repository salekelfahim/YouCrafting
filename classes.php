<?php
include "connection.php";
class Article extends Connection
{
    private $title;
    private $text;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function add()
    {
        $articleQuery = $this->connectdb()->prepare("INSERT INTO article (titre,contenu, date_de_creation,personne_id) VALUES ('$this->title','$this->text',NOW(),1)");
        $articleQuery->execute();
    }



function affichage()
{
    $query = "SELECT `id`, `titre`, `contenu`, `date_de_creation`, `personne_id` FROM `article` WHERE 1";
    $stmt = $this->connectdb()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function delete($id){
        $stm = $this->connectdb()->prepare("DELETE FROM `article` WHERE `id` = :id");
        $stm->bindParam(':id',$id);
        $stm->execute();
    }
    public function update($id,$title,$text){
        $stm= $this->connectdb()->prepare("UPDATE `article` SET `titre`= :titre,`contenu`= :contenu WHERE  `id` = :id ");
        $stm->bindParam(':id',$id);
        $stm->bindParam(':titre',$title);
        $stm->bindParam(':contenu',$text);
        $stm->execute();
    }
}
