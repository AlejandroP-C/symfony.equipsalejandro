<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IniciController extends AbstractController
{

    private $equips;
    public function __construct($dadesEquips)
    {
        $this->equips = $dadesEquips->get();
    }

    /**
     * @Route("/", name="inici")
     */
    public function inici()
    {
        return $this->render('inici.html.twig', array('equips' => $this->equips));
    }
}
