<?php

namespace App\Controller;

use App\Entity\Realisations;
use App\Form\RealisationsType;
use App\Repository\RealisationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/realisations")
 */
class RealisationsController extends AbstractController
{
    /**
     * @Route("/", name="app_realisations_index", methods={"GET"})
     */
    public function index(RealisationsRepository $realisationsRepository): Response
    {
        return $this->render('realisations/index.html.twig', [
            'realisations' => $realisationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_realisations_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RealisationsRepository $realisationsRepository): Response
    {
        $realisation = new Realisations();
        $form = $this->createForm(RealisationsType::class, $realisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $realisationsRepository->add($realisation, true);

            return $this->redirectToRoute('app_realisations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('realisations/new.html.twig', [
            'realisation' => $realisation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_realisations_show", methods={"GET"})
     */
    public function show(Realisations $realisation): Response
    {
        return $this->render('realisations/show.html.twig', [
            'realisation' => $realisation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_realisations_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Realisations $realisation, RealisationsRepository $realisationsRepository): Response
    {
        $form = $this->createForm(RealisationsType::class, $realisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $realisationsRepository->add($realisation, true);

            return $this->redirectToRoute('app_realisations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('realisations/edit.html.twig', [
            'realisation' => $realisation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_realisations_delete", methods={"POST"})
     */
    public function delete(Request $request, Realisations $realisation, RealisationsRepository $realisationsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$realisation->getId(), $request->request->get('_token'))) {
            $realisationsRepository->remove($realisation, true);
        }

        return $this->redirectToRoute('app_realisations_index', [], Response::HTTP_SEE_OTHER);
    }
}
