<?php

namespace App\Controller;

use App\Entity\Tribunal;
use App\Form\Tribunal1Type;
use App\Repository\TribunalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tribunal")
 */
class TribunalController extends Controller
{
    /**
     * @Route("/", name="tribunal_index", methods="GET")
     */
    public function index(TribunalRepository $tribunalRepository): Response
    {
        return $this->render('tribunal/index.html.twig', ['tribunals' => $tribunalRepository->findAll()]);
    }

    /**
     * @Route("/new", name="tribunal_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $tribunal = new Tribunal();
        $form = $this->createForm(Tribunal1Type::class, $tribunal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tribunal);
            $em->flush();

            return $this->redirectToRoute('tribunal_index');
        }

        return $this->render('tribunal/new.html.twig', [
            'tribunal' => $tribunal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tribunal_show", methods="GET")
     */
    public function show(Tribunal $tribunal): Response
    {
        return $this->render('tribunal/show.html.twig', ['tribunal' => $tribunal]);
    }

    /**
     * @Route("/{id}/edit", name="tribunal_edit", methods="GET|POST")
     */
    public function edit(Request $request, Tribunal $tribunal): Response
    {
        $form = $this->createForm(Tribunal1Type::class, $tribunal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tribunal_edit', ['id' => $tribunal->getId()]);
        }

        return $this->render('tribunal/edit.html.twig', [
            'tribunal' => $tribunal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tribunal_delete", methods="DELETE")
     */
    public function delete(Request $request, Tribunal $tribunal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tribunal->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tribunal);
            $em->flush();
        }

        return $this->redirectToRoute('tribunal_index');
    }
}
