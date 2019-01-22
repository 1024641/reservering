<?php

namespace App\Controller;

use App\Entity\Rekening;
use App\Form\RekeningType;
use App\Repository\RekeningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rekening")
 */
class RekeningController extends AbstractController
{
    /**
     * @Route("/", name="rekening_index", methods={"GET"})
     */
    public function index(RekeningRepository $rekeningRepository): Response
    {
        return $this->render('rekening/index.html.twig', [
            'rekenings' => $rekeningRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rekening_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rekening = new Rekening();
        $form = $this->createForm(RekeningType::class, $rekening);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rekening);
            $entityManager->flush();

            return $this->redirectToRoute('rekening_index');
        }

        return $this->render('rekening/new.html.twig', [
            'rekening' => $rekening,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rekening_show", methods={"GET"})
     */
    public function show(Rekening $rekening): Response
    {
        return $this->render('rekening/show.html.twig', [
            'rekening' => $rekening,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rekening_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rekening $rekening): Response
    {
        $form = $this->createForm(RekeningType::class, $rekening);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rekening_index', [
                'id' => $rekening->getId(),
            ]);
        }

        return $this->render('rekening/edit.html.twig', [
            'rekening' => $rekening,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rekening_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Rekening $rekening): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rekening->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rekening);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rekening_index');
    }
}
