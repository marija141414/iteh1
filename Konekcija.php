<?php

class  Konekcija{

    private $konekcija;

    public function __construct()
    {
        $this->konekcija = new Mysqli('localhost', 'root','','nakit');
        $this->konekcija->set_charset('utf8');
    }

    public function vratiSve($imeTabele)
    {
        $upit = 'SELECT * FROM ' . $imeTabele;

        $rezultati = [];

        $rezultujucaTabela = $this->konekcija->query($upit);

        while ($red = $rezultujucaTabela->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public function pretrazi($materijal, $sortiranje)
    {
        $upit = 'SELECT * FROM nakit n join materijal m on n.materijalId = m.id join pol p on n.polId = p.id ';

        if($materijal != 'BILO_KOJI_MATERIJAL'){
            $upit .= ' WHERE n.materijalId = ' . $materijal;
        }

        $upit .= ' ORDER BY n.gramaza ' . $sortiranje;

        $rezultati = [];

        $rezultujucaTabela = $this->konekcija->query($upit);

        while ($red = $rezultujucaTabela->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public function unesiNakit($model, $opis, $gramaza, $materijal, $pol)
    {
        $upit = "INSERT INTO nakit VALUES (null, '$model', '$gramaza', '$opis', $pol, $materijal, NOW(), NOW())";

        return $this->konekcija->query($upit);
    }

    public function izmeniGramazu($nakitId, $gramaza)
    {
        $upit = "UPDATE nakit SET gramaza = '$gramaza' WHERE id = $nakitId";

        return $this->konekcija->query($upit);
    }

    public function obrisiNakit($nakitId)
    {
        $upit = "DELETE FROM nakit WHERE id = $nakitId";

        return $this->konekcija->query($upit);
    }
}