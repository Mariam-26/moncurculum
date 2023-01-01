<?php

namespace App\Controller;

use App\Entity\Permis;
use App\Form\PermisType;
use App\Repository\PermisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/permis")
 */
class PermisController extends AbstractController
{
    /**
     * @Route("/", name="app_permis_index", methods={"GET"})
     */
    public function index(PermisRepository $permisRepository): Response
    {
        return $this->render('permis/index.html.twig', [
            'permis' => $permisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_permis_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PermisRepository $permisRepository): Response
    {
        $permi = new Permis();
        $form = $this->createForm(PermisType::class, $permi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $permisRepository->add($permi, true);

            return $this->redirectToRoute('app_permis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('permis/new.html.twig', [
            'permi' => $permi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_permis_show", methods={"GET"})
     */
    public function show(Permis $permi): Response
    {
        return $this->render('permis/show.html.twig', [
            'permi' => $permi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_permis_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Permis $permi, PermisRepository $permisRepository): Response
    {
        $form = $this->createForm(PermisType::class, $permi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $permisRepository->add($permi, true);

            return $this->redirectToRoute('app_permis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('permis/edit.html.twig', [
            'permi' => $permi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_permis_delete", methods={"POST"})
     */
    public function delete(Request $request, Permis $permi, PermisRepository $permisRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$permi->getId(), $request->request->get('_token'))) {
            $permisRepository->remove($permi, true);
        }

        return $this->redirectToRoute('app_permis_index', [], Response::HTTP_SEE_OTHER);
    }
}
