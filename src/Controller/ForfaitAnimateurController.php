<?php

namespace App\Controller;

use App\Entity\ForfaitAnimateur;
use App\Form\ForfaitAnimateurType;
use App\Repository\ForfaitAnimateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/forfait/animateur")
 */
class ForfaitAnimateurController extends Controller
{
    /**
     * @Route("/", name="forfait_animateur_index", methods="GET")
     */
    public function index(ForfaitAnimateurRepository $forfaitAnimateurRepository): Response
    {
        return $this->render('forfait_animateur/index.html.twig', ['forfait_animateurs' => $forfaitAnimateurRepository->findAll()]);
    }

    /**
     * @Route("/new", name="forfait_animateur_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $forfaitAnimateur = new ForfaitAnimateur();
        $form = $this->createForm(ForfaitAnimateurType::class, $forfaitAnimateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($forfaitAnimateur);
            $em->flush();

            return $this->redirectToRoute('forfait_animateur_index');
        }

        return $this->render('forfait_animateur/new.html.twig', [
            'forfait_animateur' => $forfaitAnimateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="forfait_animateur_show", methods="GET")
     */
    public function show(ForfaitAnimateur $forfaitAnimateur): Response
    {
        return $this->render('forfait_animateur/show.html.twig', ['forfait_animateur' => $forfaitAnimateur]);
    }

    /**
     * @Route("/{id}/edit", name="forfait_animateur_edit", methods="GET|POST")
     */
    public function edit(Request $request, ForfaitAnimateur $forfaitAnimateur): Response
    {
        $form = $this->createForm(ForfaitAnimateurType::class, $forfaitAnimateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('forfait_animateur_edit', ['id' => $forfaitAnimateur->getId()]);
        }

        return $this->render('forfait_animateur/edit.html.twig', [
            'forfait_animateur' => $forfaitAnimateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="forfait_animateur_delete", methods="DELETE")
     */
    public function delete(Request $request, ForfaitAnimateur $forfaitAnimateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$forfaitAnimateur->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($forfaitAnimateur);
            $em->flush();
        }

        return $this->redirectToRoute('forfait_animateur_index');
    }
}
