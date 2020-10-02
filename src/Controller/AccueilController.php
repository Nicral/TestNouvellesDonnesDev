<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ClientRepository $cr)
    {
        //$clients = $cr->findAll();
        //$clientsJs = json_encode($clients);
        //dd($clientsJs);

        return $this->render('accueil/index.html.twig', [
            "clients" => $cr->findAll(),
        ]);
    }
    
}
