<?php

namespace App\Service;

class ServeiDadesEquips
{
    private $equips = array(
        array(
            "codi" => "1", "nom" => "Equip Roig", "cicle" => "DAW",
            "curs" => "22/23", "imatge" => "equip_roig.png" , "membres" =>
            array("Elena", "Vicent", "Joan", "Maria")
        ),
        array(
            "codi" => "2", "nom" => "Equip Groc", "cicle" => "DAW",
            "curs" => "22/23", "imatge" => "equip_groc.png" , "membres" =>
            array("Albert", "Alex", "Carles", "Gemma")
        ),
        array(
            "codi" => "3", "nom" => "Equip Blau", "cicle" => "DAW",
            "curs" => "22/23", "imatge" => "equip_blau.png" , "membres" =>
            array("Júlia", "Raquel", "Raúl", "David")
        ),
        array(
            "codi" => "4", "nom" => "Equip Verd", "cicle" => "DAW",
            "curs" => "22/23", "imatge" => "equip_verd.png" , "membres" =>
            array("Sandra", "Nerea", "Llorenç", "Josep")
        )

    );

    public function get()
    {
        return $this->equips;
    }
}
