<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EquipsController extends AbstractController
{

    private $equips;
    public function __construct($dadesEquips)
    {
        $this->equips = $dadesEquips->get();
    }

    /**
     * @Route("/equip/{codi}", name="dades_equip")
     */
    public function fitxa($codi=1)
    {
        $resultat = array_filter(
            $this->equips,
            function ($equip) use ($codi) {
                return $equip["codi"] == $codi;
            }
        );
        if (count($resultat) > 0)
            return $this->render('equip.html.twig', array(
                'equip' => array_shift($resultat)
            ));
        else
            return $this->render('equip.html.twig', array(
                'equip' => NULL
            ));
    }
}
