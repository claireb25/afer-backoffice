<?php

namespace App\Controller;

use App\Entity\Bordereau;
use App\Form\BordereauType;
use App\Repository\BordereauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bordereau")
 */
class BordereauController extends Controller
{
    /**
     * @Route("/", name="bordereau_index", methods="GET")
     */
    public function index(BordereauRepository $bordereauRepository): Response
    {
        return $this->render('bordereau/index.html.twig', ['bordereaus' => $bordereauRepository->findAll()]);
    }

    /**
     * @Route("/new", name="bordereau_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $bordereau = new Bordereau();
        $form = $this->createForm(BordereauType::class, $bordereau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bordereau);
            $em->flush();

            return $this->redirectToRoute('bordereau_index');
        }

        return $this->render('bordereau/new.html.twig', [
            'bordereau' => $bordereau,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bordereau_show", methods="GET")
     */
    public function show(Bordereau $bordereau): Response
    {
        return $this->render('bordereau/show.html.twig', ['bordereau' => $bordereau]);
    }

    /**
     * @Route("/{id}/edit", name="bordereau_edit", methods="GET|POST")
     */
    public function edit(Request $request, Bordereau $bordereau): Response
    {
        $form = $this->createForm(BordereauType::class, $bordereau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bordereau_edit', ['id' => $bordereau->getId()]);
        }

        return $this->render('bordereau/edit.html.twig', [
            'bordereau' => $bordereau,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bordereau_delete", methods="DELETE")
     */
    public function delete(Request $request, Bordereau $bordereau): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bordereau->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bordereau);
            $em->flush();
        }

        return $this->redirectToRoute('bordereau_index');
    }
}
