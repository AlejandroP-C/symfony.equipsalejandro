<?php

namespace App\Controller;

use App\Entity\Equip;
use Doctrine\Persistence\ManagerRegistry;
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
    public function inici(ManagerRegistry $doctrine)
    {
        $repositori = $doctrine->getRepository(Equip::class);
        $equips = $repositori->findAll();

        return $this->render('inici.html.twig', array('equips' => $equips, 'error' => NULL));
    }
}
