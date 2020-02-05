<?php

namespace App\Controller;

use App\Entity\Lecteur;
use App\Form\LecteurType;
use App\Repository\LecteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lecteur")
 */
class LecteurController extends AbstractController
{
    /**
     * @Route("/", name="lecteur_index", methods={"GET"})
     */
    public function index(LecteurRepository $lecteurRepository): Response
    {
        return $this->render('lecteur/index.html.twig', [
            'lecteurs' => $lecteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lecteur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lecteur = new Lecteur();
        $form = $this->createForm(LecteurType::class, $lecteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lecteur);
            $entityManager->flush();

            return $this->redirectToRoute('lecteur_index');
        }

        return $this->render('lecteur/new.html.twig', [
            'lecteur' => $lecteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lecteur_show", methods={"GET"})
     */
    public function show(Lecteur $lecteur): Response
    {
        return $this->render('lecteur/show.html.twig', [
            'lecteur' => $lecteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lecteur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lecteur $lecteur): Response
    {
        $form = $this->createForm(LecteurType::class, $lecteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lecteur_index');
        }

        return $this->render('lecteur/edit.html.twig', [
            'lecteur' => $lecteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lecteur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lecteur $lecteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lecteur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lecteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lecteur_index');
    }
}
