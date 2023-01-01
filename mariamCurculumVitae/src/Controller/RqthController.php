<?php

namespace App\Controller;

use App\Entity\Rqth;
use App\Form\RqthType;
use App\Repository\RqthRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rqth")
 */
class RqthController extends AbstractController
{
    /**
     * @Route("/", name="app_rqth_index", methods={"GET"})
     */
    public function index(RqthRepository $rqthRepository): Response
    {
        return $this->render('rqth/index.html.twig', [
            'rqths' => $rqthRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_rqth_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RqthRepository $rqthRepository): Response
    {
        $rqth = new Rqth();
        $form = $this->createForm(RqthType::class, $rqth);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rqthRepository->add($rqth, true);

            return $this->redirectToRoute('app_rqth_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rqth/new.html.twig', [
            'rqth' => $rqth,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rqth_show", methods={"GET"})
     */
    public function show(Rqth $rqth): Response
    {
        return $this->render('rqth/show.html.twig', [
            'rqth' => $rqth,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_rqth_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Rqth $rqth, RqthRepository $rqthRepository): Response
    {
        $form = $this->createForm(RqthType::class, $rqth);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rqthRepository->add($rqth, true);

            return $this->redirectToRoute('app_rqth_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rqth/edit.html.twig', [
            'rqth' => $rqth,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rqth_delete", methods={"POST"})
     */
    public function delete(Request $request, Rqth $rqth, RqthRepository $rqthRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rqth->getId(), $request->request->get('_token'))) {
            $rqthRepository->remove($rqth, true);
        }

        return $this->redirectToRoute('app_rqth_index', [], Response::HTTP_SEE_OTHER);
    }
}
