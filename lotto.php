<?php

class Lotto {

    private $id;
    private $hozzaAdva;
    private $jatekosNeve;
    private $elsoSzam;
    private $masodikSzam;
    private $harmadikSzam;
    private $negyedikSzam;
    private $otodikSzam;


    public function __construct(String $jatekosNeve,
                                Int $elsoSzam,
                                Int $masodikSzam,
                                Int $harmadikSzam,
                                Int $negyedikSzam,
                                Int $otodikSzam) {
        $this->jatekosNeve = $jatekosNeve;
        $this->elsoSzam = $elsoSzam;
        $this->masodikSzam = $masodikSzam;
        $this->harmadikSzam = $harmadikSzam;
        $this->negyedikSzam = $negyedikSzam;
        $this->otodikSzam = $otodikSzam;
    }

    public function getId() : Int {
        return $this->id;
    }

    public function getHozzaAdva() : DateTime {
        return $this->hozzaAdva;
    }

    public function getJatekosNeve() : String {
        return $this->jatekosNeve;
    }

    public function getElsoSzam() : Int {
        return $this->elsoSzam;
    }

    public function getMasodikSzam() : Int {
        return $this->masodikSzam;
    }

    public function getHarmadikSzam() : Int {
        return $this->harmadikSzam;
    }

    public function getNegyedikSzam() : Int {
        return $this->negyedikSzam;
    }

    public function getOtodikSzam() : Int {
        return $this->otodikSzam;
    }


    public function insert() {
        global $db;
        $datum = date('Y-m-d H:i:s');

        $db->prepare("INSERT INTO lottoszelvenyek (jatekosNeve, feladasDatuma, elsoSzam, masodikSzam, harmadikSzam, negyedikSzam, otodikSzam)
                        VALUES (:jatekosNeve, :feladasDatuma, :, :mech, :htv)")
                    ->execute([ ':jatekosNeve' => $this->jatekosNeve,
                                ':feladasDatuma' => $datum,
                                ':elsoSzam' => $this->elsoSzam,
                                ':masodikSzam' => $this->masodikSzam,
                                ':harmadikSzam' => $this->harmadikSzam,
                                ':negyedikSzam' => $this->negyedikSzam,
                                ':otodikSzam' => $this->otodikSzam]);
    }

    public static function delete(Int $id) {
        global $db;

        $db->prepare("DELETE FROM lottoszelvenyek WHERE id = :id")
            ->execute([':id' => $id]);
    } 

    public static function getAllByID() : array {
        global $db;
        $tomb = [];

        $tabla = $db->query("SELECT * FROM lottoszelvenyek ORDER BY id ASC")->fetchAll();

        foreach($tabla as $sor) {
            $lotto = new lotto( $sor['jatekosNeve'],
                                $sor['elsoSzam'],
                                $sor['masodikSzam'],
                                $sor['harmadikSzam'],
                                $sor['negyedikSzam'],
                                $sor['otodikSzam']);
            $lotto->feladasDatuma = new DateTime($sor['feladasDatuma']);
            $lotto->id = $sor['id'];
            $tomb[] = $lotto;
        }

        return $tomb;
    }
}
 ?>