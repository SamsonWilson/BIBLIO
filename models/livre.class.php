<?php
class livre {
    private $id;
    private $titre;
    private $nbPage;
    private $image;


    public function __construct($id,$titre,$nbPage,$image)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->nbPage= $nbPage;
        $this->image= $image;
       
    }

    public function getid(){return $this->id;}
    public function setid($id){$this->id = $id;}

    public function gettitre(){return $this->titre;}
    public function settitre($titre){$this->titre = $titre;}

    public function getnbPage(){return $this->nbPage;}
    public function setnbPage($nbPage){$this->nbPage = $nbPage;}

    public function getimage(){return $this->image;}
    public function setimage($image){$this->image = $image;}

}

?>