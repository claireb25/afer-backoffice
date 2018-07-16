<?php

namespace App\Controller;

use App\Entity\NatureTribunal;
use App\Form\NatureTribunalType;
use App\Repository\NatureTribunalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nature/tribunal")
 */
class NatureTribunalController extends Controller
{
    /**
     * @Route("/", name="nature_tribunal_index", methods="GET")
     */
    public function index(NatureTribunalRepository $natureTribunalRepository): Response
    {
        return $this->render('nature_tribunal/index.html.twig', ['nature_tribunals' => $natureTribunalRepository->findAll()]);
    }

    /**
     * @Route("/new", name="nature_tribunal_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $natureTribunal = new NatureTribunal();
        $form = $this->createForm(NatureTribunalType::class, $natureTribunal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($natureTribunal);
            $em->flush();

            return $this->redirectToRoute('nature_tribunal_index');
        }

        return $this->render('nature_tribunal/new.html.twig', [
            'nature_tribunal' => $natureTribunal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nature_tribunal_show", methods="GET")
     */
    public function show(NatureTribunal $natureTribunal): Response
    {
        return $this->render('nature_tribunal/show.html.twig', ['nature_tribunal' => $natureTribunal]);
    }

    /**
     * @Route("/{id}/edit", name="nature_tribunal_edit", methods="GET|POST")
     */
    public function edit(Request $request, NatureTribunal $natureTribunal): Response
    {
        $form = $this->createForm(NatureTribunalType::class, $natureTribunal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nature_tribunal_edit', ['id' => $natureTribunal->getId()]);
        }

        return $this->render('nature_tribunal/edit.html.twig', [
            'nature_tribunal' => $natureTribunal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nature_tribunal_delete", methods="DELETE")
     */
    public function delete(Request $request, NatureTribunal $natureTribunal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$natureTribunal->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($natureTribunal);
            $em->flush();
        }

        return $this->redirectToRoute('nature_tribunal_index');
    }
}
