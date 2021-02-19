<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @Route("/", name="projet_")
 */

class ProjetController extends AbstractController
{
    /**
     * @Route("/projets", name="index")
     * @return Response
     */

    public function index(): Response
    {
        $projets = $this->getDoctrine()
            ->getRepository(Projet::class)
            ->findAll();

        return $this->render('projet/index.html.twig', [
            'projets' => $projets,
        ]);
    }


    /**
     * @Route("/projets/{projetId}", name="show")
     * @param string $projetId
     * @return Response
     */
    public function show(string $projetId): Response
    {
        $projet = $this->getDoctrine()
            ->getRepository(Projet::class)
            ->findOneBy(['id' => $projetId]);

        return $this->render('projet/show.html.twig', [
            'projet' => $projet,
        ]);
    }


}
