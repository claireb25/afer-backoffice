<?php

namespace App\Controller;

use App\Entity\AutoriteTribunal;
use App\Form\AutoriteTribunalType;
use App\Repository\AutoriteTribunalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/autorite/tribunal")
 */
class AutoriteTribunalController extends Controller
{
    /**
     * @Route("/", name="autorite_tribunal_index", methods="GET")
     */
    public function index(AutoriteTribunalRepository $autoriteTribunalRepository): Response
    {
        return $this->render('autorite_tribunal/index.html.twig', ['autorite_tribunals' => $autoriteTribunalRepository->findAll()]);
    }

    /**
     * @Route("/new", name="autorite_tribunal_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $autoriteTribunal = new AutoriteTribunal();
        $form = $this->createForm(AutoriteTribunalType::class, $autoriteTribunal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($autoriteTribunal);
            $em->flush();

            return $this->redirectToRoute('autorite_tribunal_index');
        }

        return $this->render('autorite_tribunal/new.html.twig', [
            'autorite_tribunal' => $autoriteTribunal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="autorite_tribunal_show", methods="GET")
     */
    public function show(AutoriteTribunal $autoriteTribunal): Response
    {
        return $this->render('autorite_tribunal/show.html.twig', ['autorite_tribunal' => $autoriteTribunal]);
    }

    /**
     * @Route("/{id}/edit", name="autorite_tribunal_edit", methods="GET|POST")
     */
    public function edit(Request $request, AutoriteTribunal $autoriteTribunal): Response
    {
        $form = $this->createForm(AutoriteTribunalType::class, $autoriteTribunal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('autorite_tribunal_edit', ['id' => $autoriteTribunal->getId()]);
        }

        return $this->render('autorite_tribunal/edit.html.twig', [
            'autorite_tribunal' => $autoriteTribunal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="autorite_tribunal_delete", methods="DELETE")
     */
    public function delete(Request $request, AutoriteTribunal $autoriteTribunal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$autoriteTribunal->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($autoriteTribunal);
            $em->flush();
        }

        return $this->redirectToRoute('autorite_tribunal_index');
    }
}
