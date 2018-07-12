<?php

namespace App\Controller;

use App\Entity\ModeEnvoiInscription;
use App\Form\ModeEnvoiInscriptionType;
use App\Repository\ModeEnvoiInscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mode/envoi/inscription")
 */
class ModeEnvoiInscriptionController extends Controller
{
    /**
     * @Route("/", name="mode_envoi_inscription_index", methods="GET")
     */
    public function index(ModeEnvoiInscriptionRepository $modeEnvoiInscriptionRepository): Response
    {
        return $this->render('mode_envoi_inscription/index.html.twig', ['mode_envoi_inscriptions' => $modeEnvoiInscriptionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="mode_envoi_inscription_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $modeEnvoiInscription = new ModeEnvoiInscription();
        $form = $this->createForm(ModeEnvoiInscriptionType::class, $modeEnvoiInscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modeEnvoiInscription);
            $em->flush();

            return $this->redirectToRoute('mode_envoi_inscription_index');
        }

        return $this->render('mode_envoi_inscription/new.html.twig', [
            'mode_envoi_inscription' => $modeEnvoiInscription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mode_envoi_inscription_show", methods="GET")
     */
    public function show(ModeEnvoiInscription $modeEnvoiInscription): Response
    {
        return $this->render('mode_envoi_inscription/show.html.twig', ['mode_envoi_inscription' => $modeEnvoiInscription]);
    }

    /**
     * @Route("/{id}/edit", name="mode_envoi_inscription_edit", methods="GET|POST")
     */
    public function edit(Request $request, ModeEnvoiInscription $modeEnvoiInscription): Response
    {
        $form = $this->createForm(ModeEnvoiInscriptionType::class, $modeEnvoiInscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mode_envoi_inscription_edit', ['id' => $modeEnvoiInscription->getId()]);
        }

        return $this->render('mode_envoi_inscription/edit.html.twig', [
            'mode_envoi_inscription' => $modeEnvoiInscription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mode_envoi_inscription_delete", methods="DELETE")
     */
    public function delete(Request $request, ModeEnvoiInscription $modeEnvoiInscription): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modeEnvoiInscription->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modeEnvoiInscription);
            $em->flush();
        }

        return $this->redirectToRoute('mode_envoi_inscription_index');
    }
}
