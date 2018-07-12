<?php

namespace App\Controller;

use App\Entity\ModeEnvoiConvoc;
use App\Form\ModeEnvoiConvocType;
use App\Repository\ModeEnvoiConvocRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mode/envoi/convoc")
 */
class ModeEnvoiConvocController extends Controller
{
    /**
     * @Route("/", name="mode_envoi_convoc_index", methods="GET")
     */
    public function index(ModeEnvoiConvocRepository $modeEnvoiConvocRepository): Response
    {
        return $this->render('mode_envoi_convoc/index.html.twig', ['mode_envoi_convocs' => $modeEnvoiConvocRepository->findAll()]);
    }

    /**
     * @Route("/new", name="mode_envoi_convoc_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $modeEnvoiConvoc = new ModeEnvoiConvoc();
        $form = $this->createForm(ModeEnvoiConvocType::class, $modeEnvoiConvoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modeEnvoiConvoc);
            $em->flush();

            return $this->redirectToRoute('mode_envoi_convoc_index');
        }

        return $this->render('mode_envoi_convoc/new.html.twig', [
            'mode_envoi_convoc' => $modeEnvoiConvoc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mode_envoi_convoc_show", methods="GET")
     */
    public function show(ModeEnvoiConvoc $modeEnvoiConvoc): Response
    {
        return $this->render('mode_envoi_convoc/show.html.twig', ['mode_envoi_convoc' => $modeEnvoiConvoc]);
    }

    /**
     * @Route("/{id}/edit", name="mode_envoi_convoc_edit", methods="GET|POST")
     */
    public function edit(Request $request, ModeEnvoiConvoc $modeEnvoiConvoc): Response
    {
        $form = $this->createForm(ModeEnvoiConvocType::class, $modeEnvoiConvoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mode_envoi_convoc_edit', ['id' => $modeEnvoiConvoc->getId()]);
        }

        return $this->render('mode_envoi_convoc/edit.html.twig', [
            'mode_envoi_convoc' => $modeEnvoiConvoc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mode_envoi_convoc_delete", methods="DELETE")
     */
    public function delete(Request $request, ModeEnvoiConvoc $modeEnvoiConvoc): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modeEnvoiConvoc->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modeEnvoiConvoc);
            $em->flush();
        }

        return $this->redirectToRoute('mode_envoi_convoc_index');
    }
}
