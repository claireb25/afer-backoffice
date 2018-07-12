<?php

namespace App\Controller;

use App\Entity\Infraction;
use App\Form\InfractionType;
use App\Repository\InfractionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/infraction")
 */
class InfractionController extends Controller
{
    /**
     * @Route("/", name="infraction_index", methods="GET")
     */
    public function index(InfractionRepository $infractionRepository): Response
    {
        return $this->render('infraction/index.html.twig', ['infractions' => $infractionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="infraction_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $infraction = new Infraction();
        $form = $this->createForm(InfractionType::class, $infraction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($infraction);
            $em->flush();

            return $this->redirectToRoute('infraction_index');
        }

        return $this->render('infraction/new.html.twig', [
            'infraction' => $infraction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="infraction_show", methods="GET")
     */
    public function show(Infraction $infraction): Response
    {
        return $this->render('infraction/show.html.twig', ['infraction' => $infraction]);
    }

    /**
     * @Route("/{id}/edit", name="infraction_edit", methods="GET|POST")
     */
    public function edit(Request $request, Infraction $infraction): Response
    {
        $form = $this->createForm(InfractionType::class, $infraction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('infraction_edit', ['id' => $infraction->getId()]);
        }

        return $this->render('infraction/edit.html.twig', [
            'infraction' => $infraction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="infraction_delete", methods="DELETE")
     */
    public function delete(Request $request, Infraction $infraction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infraction->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($infraction);
            $em->flush();
        }

        return $this->redirectToRoute('infraction_index');
    }
}
