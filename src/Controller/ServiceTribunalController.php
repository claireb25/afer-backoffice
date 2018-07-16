<?php

namespace App\Controller;

use App\Entity\ServiceTribunal;
use App\Form\ServiceTribunalType;
use App\Repository\ServiceTribunalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/service/tribunal")
 */
class ServiceTribunalController extends Controller
{
    /**
     * @Route("/", name="service_tribunal_index", methods="GET")
     */
    public function index(ServiceTribunalRepository $serviceTribunalRepository): Response
    {
        return $this->render('service_tribunal/index.html.twig', ['service_tribunals' => $serviceTribunalRepository->findAll()]);
    }

    /**
     * @Route("/new", name="service_tribunal_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $serviceTribunal = new ServiceTribunal();
        $form = $this->createForm(ServiceTribunalType::class, $serviceTribunal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($serviceTribunal);
            $em->flush();

            return $this->redirectToRoute('service_tribunal_index');
        }

        return $this->render('service_tribunal/new.html.twig', [
            'service_tribunal' => $serviceTribunal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="service_tribunal_show", methods="GET")
     */
    public function show(ServiceTribunal $serviceTribunal): Response
    {
        return $this->render('service_tribunal/show.html.twig', ['service_tribunal' => $serviceTribunal]);
    }

    /**
     * @Route("/{id}/edit", name="service_tribunal_edit", methods="GET|POST")
     */
    public function edit(Request $request, ServiceTribunal $serviceTribunal): Response
    {
        $form = $this->createForm(ServiceTribunalType::class, $serviceTribunal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('service_tribunal_edit', ['id' => $serviceTribunal->getId()]);
        }

        return $this->render('service_tribunal/edit.html.twig', [
            'service_tribunal' => $serviceTribunal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="service_tribunal_delete", methods="DELETE")
     */
    public function delete(Request $request, ServiceTribunal $serviceTribunal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$serviceTribunal->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($serviceTribunal);
            $em->flush();
        }

        return $this->redirectToRoute('service_tribunal_index');
    }
}
