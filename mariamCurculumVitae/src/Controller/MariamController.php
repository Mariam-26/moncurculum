<?php

namespace App\Controller;

use App\Entity\Mariam;
use App\Form\MariamType;
use App\Repository\MariamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mariam")
 */
class MariamController extends AbstractController
{
    /**
     * @Route("/", name="app_mariam_index", methods={"GET"})
     */
    public function index(MariamRepository $mariamRepository): Response
    {
        return $this->render('mariam/index.html.twig', [
            'mariams' => $mariamRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_mariam_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MariamRepository $mariamRepository): Response
    {
        $mariam = new Mariam();
        $form = $this->createForm(MariamType::class, $mariam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mariamRepository->add($mariam, true);

            // $mariam->setVerifier(false);

            return $this->redirectToRoute('app_mariam_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mariam/new.html.twig', [
            'mariam' => $mariam,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_mariam_show", methods={"GET"})
     */
    public function show(Mariam $mariam): Response
    {
        return $this->render('mariam/show.html.twig', [
            'mariam' => $mariam,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_mariam_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Mariam $mariam, MariamRepository $mariamRepository): Response
    {
        $form = $this->createForm(MariamType::class, $mariam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mariamRepository->add($mariam, true);

            return $this->redirectToRoute('app_mariam_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mariam/edit.html.twig', [
            'mariam' => $mariam,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_mariam_delete", methods={"POST"})
     */
    public function delete(Request $request, Mariam $mariam, MariamRepository $mariamRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mariam->getId(), $request->request->get('_token'))) {
            $mariamRepository->remove($mariam, true);
        }

        return $this->redirectToRoute('app_mariam_index', [], Response::HTTP_SEE_OTHER);
    }
}
