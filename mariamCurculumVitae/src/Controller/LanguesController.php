<?php

namespace App\Controller;

use App\Entity\Langues;
use App\Form\LanguesType;
use App\Repository\LanguesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/langues")
 */
class LanguesController extends AbstractController
{
    /**
     * @Route("/", name="app_langues_index", methods={"GET"})
     */
    public function index(LanguesRepository $languesRepository): Response
    {
        return $this->render('langues/index.html.twig', [
            'langues' => $languesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_langues_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LanguesRepository $languesRepository): Response
    {
        $langue = new Langues();
        $form = $this->createForm(LanguesType::class, $langue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $languesRepository->add($langue, true);

            return $this->redirectToRoute('app_langues_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('langues/new.html.twig', [
            'langue' => $langue,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_langues_show", methods={"GET"})
     */
    public function show(Langues $langue): Response
    {
        return $this->render('langues/show.html.twig', [
            'langue' => $langue,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_langues_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Langues $langue, LanguesRepository $languesRepository): Response
    {
        $form = $this->createForm(LanguesType::class, $langue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $languesRepository->add($langue, true);

            return $this->redirectToRoute('app_langues_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('langues/edit.html.twig', [
            'langue' => $langue,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_langues_delete", methods={"POST"})
     */
    public function delete(Request $request, Langues $langue, LanguesRepository $languesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$langue->getId(), $request->request->get('_token'))) {
            $languesRepository->remove($langue, true);
        }

        return $this->redirectToRoute('app_langues_index', [], Response::HTTP_SEE_OTHER);
    }
}
