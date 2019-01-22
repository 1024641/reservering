<?php

namespace App\Controller;

use App\Entity\Stoel;
use App\Form\StoelType;
use App\Repository\StoelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stoel")
 */
class StoelController extends AbstractController
{
    /**
     * @Route("/", name="stoel_index", methods={"GET"})
     */
    public function index(StoelRepository $stoelRepository): Response
    {
        return $this->render('stoel/index.html.twig', [
            'stoels' => $stoelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="stoel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stoel = new Stoel();
        $form = $this->createForm(StoelType::class, $stoel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stoel);
            $entityManager->flush();

            return $this->redirectToRoute('stoel_index');
        }

        return $this->render('stoel/new.html.twig', [
            'stoel' => $stoel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stoel_show", methods={"GET"})
     */
    public function show(Stoel $stoel): Response
    {
        return $this->render('stoel/show.html.twig', [
            'stoel' => $stoel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="stoel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Stoel $stoel): Response
    {
        $form = $this->createForm(StoelType::class, $stoel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stoel_index', [
                'id' => $stoel->getId(),
            ]);
        }

        return $this->render('stoel/edit.html.twig', [
            'stoel' => $stoel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stoel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Stoel $stoel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stoel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stoel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stoel_index');
    }
}
