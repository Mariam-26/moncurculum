<?php

namespace App\Controller;

use App\Entity\Loisirs;
use App\Form\LoisirsType;
use App\Repository\LoisirsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/loisirs")
 */
class LoisirsController extends AbstractController
{
    /**
     * @Route("/", name="app_loisirs_index", methods={"GET"})
     */
    public function index(LoisirsRepository $loisirsRepository): Response
    {
        return $this->render('loisirs/index.html.twig', [
            'loisirs' => $loisirsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_loisirs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LoisirsRepository $loisirsRepository): Response
    {
        $loisir = new Loisirs();
        $form = $this->createForm(LoisirsType::class, $loisir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $loisirsRepository->add($loisir, true);

            return $this->redirectToRoute('app_loisirs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('loisirs/new.html.twig', [
            'loisir' => $loisir,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_loisirs_show", methods={"GET"})
     */
    public function show(Loisirs $loisir): Response
    {
        return $this->render('loisirs/show.html.twig', [
            'loisir' => $loisir,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_loisirs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Loisirs $loisir, LoisirsRepository $loisirsRepository): Response
    {
        $form = $this->createForm(LoisirsType::class, $loisir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $loisirsRepository->add($loisir, true);

            return $this->redirectToRoute('app_loisirs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('loisirs/edit.html.twig', [
            'loisir' => $loisir,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_loisirs_delete", methods={"POST"})
     */
    public function delete(Request $request, Loisirs $loisir, LoisirsRepository $loisirsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$loisir->getId(), $request->request->get('_token'))) {
            $loisirsRepository->remove($loisir, true);
        }

        return $this->redirectToRoute('app_loisirs_index', [], Response::HTTP_SEE_OTHER);
    }
}
