<?php

namespace App\Controller;

use App\Entity\LieuStage;
use App\Form\LieuStageType;
use App\Repository\LieuStageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lieu/stage")
 */
class LieuStageController extends Controller
{
    /**
     * @Route("/", name="lieu_stage_index", methods="GET")
     */
    public function index(LieuStageRepository $lieuStageRepository): Response
    {
        return $this->render('lieu_stage/index.html.twig', ['lieu_stages' => $lieuStageRepository->findAll()]);
    }

    /**
     * @Route("/new", name="lieu_stage_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $lieuStage = new LieuStage();
        $form = $this->createForm(LieuStageType::class, $lieuStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lieuStage);
            $em->flush();

            return $this->redirectToRoute('lieu_stage_index');
        }

        return $this->render('lieu_stage/new.html.twig', [
            'lieu_stage' => $lieuStage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lieu_stage_show", methods="GET")
     */
    public function show(LieuStage $lieuStage): Response
    {
        return $this->render('lieu_stage/show.html.twig', ['lieu_stage' => $lieuStage]);
    }

    /**
     * @Route("/{id}/edit", name="lieu_stage_edit", methods="GET|POST")
     */
    public function edit(Request $request, LieuStage $lieuStage): Response
    {
        $form = $this->createForm(LieuStageType::class, $lieuStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lieu_stage_edit', ['id' => $lieuStage->getId()]);
        }

        return $this->render('lieu_stage/edit.html.twig', [
            'lieu_stage' => $lieuStage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lieu_stage_delete", methods="DELETE")
     */
    public function delete(Request $request, LieuStage $lieuStage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lieuStage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lieuStage);
            $em->flush();
        }

        return $this->redirectToRoute('lieu_stage_index');
    }
}
