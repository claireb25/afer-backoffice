<?php

namespace App\Controller;

use App\Entity\StatutAnimateur;
use App\Form\StatutAnimateurType;
use App\Repository\StatutAnimateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/statut/animateur")
 */
class StatutAnimateurController extends Controller
{
    /**
     * @Route("/", name="statut_animateur_index", methods="GET")
     */
    public function index(StatutAnimateurRepository $statutAnimateurRepository): Response
    {
        return $this->render('statut_animateur/index.html.twig', ['statut_animateurs' => $statutAnimateurRepository->findAll()]);
    }

    /**
     * @Route("/new", name="statut_animateur_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $statutAnimateur = new StatutAnimateur();
        $form = $this->createForm(StatutAnimateurType::class, $statutAnimateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($statutAnimateur);
            $em->flush();

            return $this->redirectToRoute('statut_animateur_index');
        }

        return $this->render('statut_animateur/new.html.twig', [
            'statut_animateur' => $statutAnimateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="statut_animateur_show", methods="GET")
     */
    public function show(StatutAnimateur $statutAnimateur): Response
    {
        return $this->render('statut_animateur/show.html.twig', ['statut_animateur' => $statutAnimateur]);
    }

    /**
     * @Route("/{id}/edit", name="statut_animateur_edit", methods="GET|POST")
     */
    public function edit(Request $request, StatutAnimateur $statutAnimateur): Response
    {
        $form = $this->createForm(StatutAnimateurType::class, $statutAnimateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('statut_animateur_edit', ['id' => $statutAnimateur->getId()]);
        }

        return $this->render('statut_animateur/edit.html.twig', [
            'statut_animateur' => $statutAnimateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="statut_animateur_delete", methods="DELETE")
     */
    public function delete(Request $request, StatutAnimateur $statutAnimateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statutAnimateur->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($statutAnimateur);
            $em->flush();
        }

        return $this->redirectToRoute('statut_animateur_index');
    }
}
