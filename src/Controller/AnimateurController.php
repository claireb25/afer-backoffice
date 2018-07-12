<?php

namespace App\Controller;

use App\Entity\Animateur;
use App\Form\AnimateurType;
use App\Repository\AnimateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/animateur")
 */
class AnimateurController extends Controller
{
    /**
     * @Route("/", name="animateur_index", methods="GET")
     */
    public function index(AnimateurRepository $animateurRepository): Response
    {
        return $this->render('animateur/index.html.twig', ['animateurs' => $animateurRepository->findAll()]);
    }

    /**
     * @Route("/new", name="animateur_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $animateur = new Animateur();
        $form = $this->createForm(AnimateurType::class, $animateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animateur);
            $em->flush();

            return $this->redirectToRoute('animateur_index');
        }

        return $this->render('animateur/new.html.twig', [
            'animateur' => $animateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="animateur_show", methods="GET")
     */
    public function show(Animateur $animateur): Response
    {
        return $this->render('animateur/show.html.twig', ['animateur' => $animateur]);
    }

    /**
     * @Route("/{id}/edit", name="animateur_edit", methods="GET|POST")
     */
    public function edit(Request $request, Animateur $animateur): Response
    {
        $form = $this->createForm(AnimateurType::class, $animateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('animateur_edit', ['id' => $animateur->getId()]);
        }

        return $this->render('animateur/edit.html.twig', [
            'animateur' => $animateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="animateur_delete", methods="DELETE")
     */
    public function delete(Request $request, Animateur $animateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animateur->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($animateur);
            $em->flush();
        }

        return $this->redirectToRoute('animateur_index');
    }
}
