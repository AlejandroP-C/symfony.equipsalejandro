<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipsController
{
    private $equips = array(
        array(
            "codi" => "1", "nom" => "Equip Roig", "cicle" => "DAW",
            "curs" => "22/23", "membres" =>
            array("Elena", "Vicent", "Joan", "Maria")
        ),
        array(
            "codi" => "2", "nom" => "Equip Groc", "cicle" => "DAW",
            "curs" => "22/23", "membres" =>
            array("Albert", "Alex", "Carles", "Gemma")
        ),
        array(
            "codi" => "3", "nom" => "Equip Blau", "cicle" => "DAW",
            "curs" => "22/23", "membres" =>
            array("Júlia", "Raquel", "Raúl", "David")
        ),
        array(
            "codi" => "4", "nom" => "Equip Verd", "cicle" => "DAW",
            "curs" => "22/23", "membres" =>
            array("Sandra", "Nerea", "Llorenç", "Josep")
        )

    );

    /**
     * @Route("/equip/{codi}", name="dades_equip")
     */
    public function fitxa($codi)
    {
        $resultat = array_filter(
            $this->equips,
            function ($equip) use ($codi) {
                return $equip["codi"] == $codi;
            }
        );
        if (count($resultat) > 0) {
            $resposta = "";
            $resultat = array_shift($resultat); #torna el primer element
            $resposta .= "<ul><li>" . $resultat["nom"] . "</li>" .
                "<li>" . $resultat["cicle"] . "</li>" .
                "<li>" . $resultat["curs"] . "</li>" .
                "<li>" . implode(", ", $resultat["membres"]) . "</li>" . "</ul>";
            return new Response("<html><body>$resposta</body></html>");
        } else
            return new Response("No s'ha trobat l'equip: " . $codi);
    }
}
