<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(ClientRepository $cr)
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            "clients" => $cr->findAll(),
        ]);
    }
}
