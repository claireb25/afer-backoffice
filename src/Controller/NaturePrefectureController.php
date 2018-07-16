<?php

namespace App\Controller;

use App\Entity\NaturePrefecture;
use App\Form\NaturePrefectureType;
use App\Repository\NaturePrefectureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nature/prefecture")
 */
class NaturePrefectureController extends Controller
{
    /**
     * @Route("/", name="nature_prefecture_index", methods="GET")
     */
    public function index(NaturePrefectureRepository $naturePrefectureRepository): Response
    {
        return $this->render('nature_prefecture/index.html.twig', ['nature_prefectures' => $naturePrefectureRepository->findAll()]);
    }

    /**
     * @Route("/new", name="nature_prefecture_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $naturePrefecture = new NaturePrefecture();
        $form = $this->createForm(NaturePrefectureType::class, $naturePrefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($naturePrefecture);
            $em->flush();

            return $this->redirectToRoute('nature_prefecture_index');
        }

        return $this->render('nature_prefecture/new.html.twig', [
            'nature_prefecture' => $naturePrefecture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nature_prefecture_show", methods="GET")
     */
    public function show(NaturePrefecture $naturePrefecture): Response
    {
        return $this->render('nature_prefecture/show.html.twig', ['nature_prefecture' => $naturePrefecture]);
    }

    /**
     * @Route("/{id}/edit", name="nature_prefecture_edit", methods="GET|POST")
     */
    public function edit(Request $request, NaturePrefecture $naturePrefecture): Response
    {
        $form = $this->createForm(NaturePrefectureType::class, $naturePrefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nature_prefecture_edit', ['id' => $naturePrefecture->getId()]);
        }

        return $this->render('nature_prefecture/edit.html.twig', [
            'nature_prefecture' => $naturePrefecture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nature_prefecture_delete", methods="DELETE")
     */
    public function delete(Request $request, NaturePrefecture $naturePrefecture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$naturePrefecture->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($naturePrefecture);
            $em->flush();
        }

        return $this->redirectToRoute('nature_prefecture_index');
    }
}
