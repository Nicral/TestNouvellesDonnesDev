<?php

namespace App\Controller;

use App\Entity\Photo;
use App\Form\PhotoType;
use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/photo")
 */
class PhotoController extends AbstractController
{
    /**
     * @Route("/", name="photo_index", methods={"GET"})
     */
    public function index(PhotoRepository $photoRepository): Response
    {
        return $this->render('photo/index.html.twig', [
            'photos' => $photoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="photo_new", methods={"GET","POST"})
     */
    public function new(PhotoRepository $photoRepository, Request $request): Response
    {

        $photo = new Photo();
        $form = $this->createForm(PhotoType::class, $photo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            // Je récupère les informations du fichier uploadé
            $photoUploade = $form->get("nom_photo")->getData();

            // Je récupère le nom du fichier uploadé
            $nomPhoto = pathinfo($photoUploade->getClientOriginalName(), PATHINFO_FILENAME);

            // Je remplace les espaces dans le nom du fichier
            $nomPhoto = str_replace(" ", "_", $nomPhoto);

            // Je rajoute un string unique (pour éviter les fichiers doublons) et l'extension du fichier téléchargé
            $nomPhoto .= uniqid() . "." . $photoUploade->guessExtension();

            // J'enregistre le fichier uploadé sur mon serveur, dans le dossier public/images
            $photoUploade->move("images", $nomPhoto);

            // Pour enregistrer l'information en BDD
            $photo->setnomPhoto($nomPhoto);
            $entityManager->persist($photo);
            $entityManager->flush();

            $this->addFlash('message', 'La photo a été correctement uploadé'); // Permet un message flash de renvoi

            return $this->redirectToRoute('photo_index');
        }

        return $this->render('photo/new.html.twig', [
            'photos' => $photoRepository->findAll(),
            'photo' => $photo,
            'form' => $form->createView(),
        ]);
        
    }

    /**
     * @Route("/{id}", name="photo_show", methods={"GET"})
     */
    public function show(Photo $photo): Response
    {
        return $this->render('photo/show.html.twig', [
            'photo' => $photo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Photo $photo): Response
    {
        $form = $this->createForm(PhotoType::class, $photo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photo_index');
        }

        return $this->render('photo/edit.html.twig', [
            'photo' => $photo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Photo $photo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('photo_index');
    }
}
