<?php

namespace App\Controller;

use App\Entity\Equip;
use App\Entity\Membre;
use DateTime;
use DateTimeImmutable;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;

class MembresController extends AbstractController {

    /**
     * @Route("/membre/inserir", name="inserir_membre")
     */
    public function inserir(ManagerRegistry $doctrine) {

        $entityManager = $doctrine->getManager();

        $repositori = $doctrine->getRepository(Equip::class);
        $equip = $repositori->find(1);

        // $membre = new Membre();
        // $membre->setNom("Sarah");
        // $membre->setCognoms("Connor");
        // $membre->setEmail("sarahconnor@skynet.com");
        // $membre->setImatgePerfil("");

        // $date = new DateTimeImmutable("1963-11-29");
        // $datanaixement = DateTime::createFromInterface($date);
        // $membre->setDataNaixement($datanaixement);

        // $membre->setNota(9.7);
        // $membre->setEquip($equip);

        $membre = new Membre();
        $membre->setNom("John");
        $membre->setCognoms("Connor");
        $membre->setEmail("johnconnor@skynet.com");
        $membre->setImatgePerfil("");

        $date = new DateTimeImmutable("1985-02-28");
        $datanaixement = DateTime::createFromInterface($date);
        $membre->setDataNaixement($datanaixement);

        $membre->setNota(6.7);
        $membre->setEquip($equip);

        $entityManager->persist($membre);

        try {

            $entityManager->flush();
            return $this->render('inserir_membre.html.twig', array('membre' => $membre, 'error' => NULL));

        } catch (\Exception $e) { return $this->render('inserir_membre.html.twig', array('membre' => $membre->getNom(), 'error' => $e->getMessage())); }
        
    }

}