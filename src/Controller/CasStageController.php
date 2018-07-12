<?php

namespace App\Controller;

use App\Entity\CasStage;
use App\Form\CasStageType;
use App\Repository\CasStageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cas/stage")
 */
class CasStageController extends Controller
{
    /**
     * @Route("/", name="cas_stage_index", methods="GET")
     */
    public function index(CasStageRepository $casStageRepository): Response
    {
        return $this->render('cas_stage/index.html.twig', ['cas_stages' => $casStageRepository->findAll()]);
    }

    /**
     * @Route("/new", name="cas_stage_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $casStage = new CasStage();
        $form = $this->createForm(CasStageType::class, $casStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($casStage);
            $em->flush();

            return $this->redirectToRoute('cas_stage_index');
        }

        return $this->render('cas_stage/new.html.twig', [
            'cas_stage' => $casStage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cas_stage_show", methods="GET")
     */
    public function show(CasStage $casStage): Response
    {
        return $this->render('cas_stage/show.html.twig', ['cas_stage' => $casStage]);
    }

    /**
     * @Route("/{id}/edit", name="cas_stage_edit", methods="GET|POST")
     */
    public function edit(Request $request, CasStage $casStage): Response
    {
        $form = $this->createForm(CasStageType::class, $casStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cas_stage_edit', ['id' => $casStage->getId()]);
        }

        return $this->render('cas_stage/edit.html.twig', [
            'cas_stage' => $casStage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cas_stage_delete", methods="DELETE")
     */
    public function delete(Request $request, CasStage $casStage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$casStage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($casStage);
            $em->flush();
        }

        return $this->redirectToRoute('cas_stage_index');
    }
}
