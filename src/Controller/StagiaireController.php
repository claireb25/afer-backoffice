<?php

namespace App\Controller;

use App\Entity\Stagiaire;
use App\Form\StagiaireType;
use App\Repository\StagiaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stagiaire")
 */
class StagiaireController extends Controller
{
    /**
     * @Route("/", name="stagiaire_index", methods="GET")
     */
    public function index(StagiaireRepository $stagiaireRepository): Response
    {
        return $this->render('stagiaire/index.html.twig', ['stagiaires' => $stagiaireRepository->findAll()]);
    }

    /**
     * @Route("/new", name="stagiaire_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $stagiaire = new Stagiaire();
        $form = $this->createForm(StagiaireType::class, $stagiaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stagiaire);
            $em->flush();

            return $this->redirectToRoute('stagiaire_index');
        }

        return $this->render('stagiaire/new.html.twig', [
            'stagiaire' => $stagiaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stagiaire_show", methods="GET")
     */
    public function show(Stagiaire $stagiaire): Response
    {
        return $this->render('stagiaire/show.html.twig', ['stagiaire' => $stagiaire]);
    }

    /**
     * @Route("/{id}/edit", name="stagiaire_edit", methods="GET|POST")
     */
    public function edit(Request $request, Stagiaire $stagiaire): Response
    {
        $form = $this->createForm(StagiaireType::class, $stagiaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stagiaire_edit', ['id' => $stagiaire->getId()]);
        }

        return $this->render('stagiaire/edit.html.twig', [
            'stagiaire' => $stagiaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stagiaire_delete", methods="DELETE")
     */
    public function delete(Request $request, Stagiaire $stagiaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stagiaire->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stagiaire);
            $em->flush();
        }

        return $this->redirectToRoute('stagiaire_index');
    }
}
