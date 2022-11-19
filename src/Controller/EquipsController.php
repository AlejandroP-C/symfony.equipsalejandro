<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EquipsController extends AbstractController
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
        if (count($resultat) > 0)
            return $this->render('dades_equip.html.twig', array(
                'equip' => array_shift($resultat)
            ));
        else
            return $this->render('dades_equip.html.twig', array(
                'equip' => NULL
            ));
    }
}
