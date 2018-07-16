<?php

namespace App\Controller;

use App\Entity\ServicePrefecture;
use App\Form\ServicePrefectureType;
use App\Repository\ServicePrefectureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/service/prefecture")
 */
class ServicePrefectureController extends Controller
{
    /**
     * @Route("/", name="service_prefecture_index", methods="GET")
     */
    public function index(ServicePrefectureRepository $servicePrefectureRepository): Response
    {
        return $this->render('service_prefecture/index.html.twig', ['service_prefectures' => $servicePrefectureRepository->findAll()]);
    }

    /**
     * @Route("/new", name="service_prefecture_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $servicePrefecture = new ServicePrefecture();
        $form = $this->createForm(ServicePrefectureType::class, $servicePrefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicePrefecture);
            $em->flush();

            return $this->redirectToRoute('service_prefecture_index');
        }

        return $this->render('service_prefecture/new.html.twig', [
            'service_prefecture' => $servicePrefecture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="service_prefecture_show", methods="GET")
     */
    public function show(ServicePrefecture $servicePrefecture): Response
    {
        return $this->render('service_prefecture/show.html.twig', ['service_prefecture' => $servicePrefecture]);
    }

    /**
     * @Route("/{id}/edit", name="service_prefecture_edit", methods="GET|POST")
     */
    public function edit(Request $request, ServicePrefecture $servicePrefecture): Response
    {
        $form = $this->createForm(ServicePrefectureType::class, $servicePrefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('service_prefecture_edit', ['id' => $servicePrefecture->getId()]);
        }

        return $this->render('service_prefecture/edit.html.twig', [
            'service_prefecture' => $servicePrefecture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="service_prefecture_delete", methods="DELETE")
     */
    public function delete(Request $request, ServicePrefecture $servicePrefecture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicePrefecture->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servicePrefecture);
            $em->flush();
        }

        return $this->redirectToRoute('service_prefecture_index');
    }
}
