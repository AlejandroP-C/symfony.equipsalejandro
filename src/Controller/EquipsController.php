<?php

namespace App\Controller;

use App\Entity\Equip;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

class EquipsController extends AbstractController
{

    private $equips;
    public function __construct($dadesEquips)
    {
        $this->equips = $dadesEquips->get();
    }

    /**
     * @Route("/equip/inserir", name="inserir_equip")
     */
    public function inserir(ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $equip = new Equip();
        $equip->setNom("Simarrets");
        $equip->setCicle("DAW");
        $equip->setCurs("22/23");
        $equip->setNota(9);
        $equip->setImatge("equipPerDefecte.png");

        $entityManager->persist($equip);

        try {

            $entityManager->flush();
            return $this->render('inserir_equip.html.twig', array('equip' => $equip, 'error' => NULL));

        } catch (\Exception $e) { return $this->render('inserir_equip.html.twig', array('equip' => $equip->getNom(), 'error' => $e->getMessage())); }
        
    }

    /**
     * @Route("/equip/inserirmultiple", name="inserir_multiples_equips")
     */
    public function inserirmultiple(ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $equipRoig = new Equip();
        $equipRoig->setNom("Equip Roig");
        $equipRoig->setCicle("DAW");
        $equipRoig->setCurs("22/23");
        $equipRoig->setNota(9.25);
        $equipRoig->setImatge("equip_roig.png");

        $equipGroc = new Equip();
        $equipGroc->setNom("Equip Groc");
        $equipGroc->setCicle("DAW");
        $equipGroc->setCurs("22/23");
        $equipGroc->setNota(8.5);
        $equipGroc->setImatge("equip_groc.png");

        $equipBlau = new Equip();
        $equipBlau->setNom("Equip Blau");
        $equipBlau->setCicle("DAW");
        $equipBlau->setCurs("22/23");
        $equipBlau->setNota(7.75);
        $equipBlau->setImatge("equip_blau.png");

        $equipVerd = new Equip();
        $equipVerd->setNom("Equip Verd");
        $equipVerd->setCicle("DAW");
        $equipVerd->setCurs("22/23");
        $equipVerd->setNota(8.80);
        $equipVerd->setImatge("equip_verd.png");

        $entityManager->persist($equipRoig);
        $entityManager->persist($equipGroc);
        $entityManager->persist($equipBlau);
        $entityManager->persist($equipVerd);

        $arr_equips = [$equipRoig, $equipGroc, $equipBlau, $equipVerd];

        try {

            $entityManager->flush();
            return $this->render('inserir_equip_multiple.html.twig', array('equips' => $arr_equips, 'error' => NULL));

        } catch (\Exception $e) { return $this->render('inserir_equip_multiple.html.twig', array('equips' => $arr_equips, 'error' => $e->getMessage())); }

    }

    /**
     * @Route("/equip/{codi}", name="dades_equip", requirements={"codi"="\d+"}))
     */
    public function fitxa($codi, ManagerRegistry $doctrine)
    {

        $repositori = $doctrine->getRepository(Equip::class);
        $equip = $repositori->find($codi);

        if ($equip) {
            return $this->render('equip.html.twig', array('equip' => $equip));
        } else {
            return $this->render('equip.html.twig', array('equip' => NULL));
        }
            
    }

    /**
     * @Route("/equip/nota/{nota}", name="filtrar_notes", requirements={"nota"="^(10|\d)(\.\d{1,2})?$"}))
     */
    public function filtrenotes($nota, ManagerRegistry $doctrine)
    {

        $repositori = $doctrine->getRepository(Equip::class);
        $equips = $repositori->orderByNota($nota);

        try {

            if (!empty($equips)) {

                return $this->render('inici.html.twig', array('equips' => $equips, 'error' => NULL));

            } else { throw new Exception("No s'han trobat equips", 1); }

        } catch (\Exception $e) { return $this->render('inici.html.twig', array('error' => $e->getMessage())); }
            
    }
}