<?php

namespace App\Controller;

use App\Entity\FonctionAnimateur;
use App\Form\FonctionAnimateurType;
use App\Repository\FonctionAnimateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fonction/animateur")
 */
class FonctionAnimateurController extends Controller
{
    /**
     * @Route("/", name="fonction_animateur_index", methods="GET")
     */
    public function index(FonctionAnimateurRepository $fonctionAnimateurRepository): Response
    {
        return $this->render('fonction_animateur/index.html.twig', ['fonction_animateurs' => $fonctionAnimateurRepository->findAll()]);
    }

    /**
     * @Route("/new", name="fonction_animateur_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $fonctionAnimateur = new FonctionAnimateur();
        $form = $this->createForm(FonctionAnimateurType::class, $fonctionAnimateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fonctionAnimateur);
            $em->flush();

            return $this->redirectToRoute('fonction_animateur_index');
        }

        return $this->render('fonction_animateur/new.html.twig', [
            'fonction_animateur' => $fonctionAnimateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fonction_animateur_show", methods="GET")
     */
    public function show(FonctionAnimateur $fonctionAnimateur): Response
    {
        return $this->render('fonction_animateur/show.html.twig', ['fonction_animateur' => $fonctionAnimateur]);
    }

    /**
     * @Route("/{id}/edit", name="fonction_animateur_edit", methods="GET|POST")
     */
    public function edit(Request $request, FonctionAnimateur $fonctionAnimateur): Response
    {
        $form = $this->createForm(FonctionAnimateurType::class, $fonctionAnimateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fonction_animateur_edit', ['id' => $fonctionAnimateur->getId()]);
        }

        return $this->render('fonction_animateur/edit.html.twig', [
            'fonction_animateur' => $fonctionAnimateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fonction_animateur_delete", methods="DELETE")
     */
    public function delete(Request $request, FonctionAnimateur $fonctionAnimateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fonctionAnimateur->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fonctionAnimateur);
            $em->flush();
        }

        return $this->redirectToRoute('fonction_animateur_index');
    }
}
