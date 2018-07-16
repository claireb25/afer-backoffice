<?php

namespace App\Controller;

use App\Entity\Autorite;
use App\Form\AutoriteType;
use App\Repository\AutoriteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/autorite")
 */
class AutoriteController extends Controller
{
    /**
     * @Route("/", name="autorite_index", methods="GET")
     */
    public function index(AutoriteRepository $autoriteRepository): Response
    {
        return $this->render('autorite/index.html.twig', ['autorites' => $autoriteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="autorite_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $autorite = new Autorite();
        $form = $this->createForm(AutoriteType::class, $autorite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($autorite);
            $em->flush();

            return $this->redirectToRoute('autorite_index');
        }

        return $this->render('autorite/new.html.twig', [
            'autorite' => $autorite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="autorite_show", methods="GET")
     */
    public function show(Autorite $autorite): Response
    {
        return $this->render('autorite/show.html.twig', ['autorite' => $autorite]);
    }

    /**
     * @Route("/{id}/edit", name="autorite_edit", methods="GET|POST")
     */
    public function edit(Request $request, Autorite $autorite): Response
    {
        $form = $this->createForm(AutoriteType::class, $autorite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('autorite_edit', ['id' => $autorite->getId()]);
        }

        return $this->render('autorite/edit.html.twig', [
            'autorite' => $autorite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="autorite_delete", methods="DELETE")
     */
    public function delete(Request $request, Autorite $autorite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$autorite->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($autorite);
            $em->flush();
        }

        return $this->redirectToRoute('autorite_index');
    }
}
