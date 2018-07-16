<?php

namespace App\Controller;

use App\Entity\AutoritePrefecture;
use App\Form\AutoritePrefectureType;
use App\Repository\AutoritePrefectureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/autorite/prefecture")
 */
class AutoritePrefectureController extends Controller
{
    /**
     * @Route("/", name="autorite_prefecture_index", methods="GET")
     */
    public function index(AutoritePrefectureRepository $autoritePrefectureRepository): Response
    {
        return $this->render('autorite_prefecture/index.html.twig', ['autorite_prefectures' => $autoritePrefectureRepository->findAll()]);
    }

    /**
     * @Route("/new", name="autorite_prefecture_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $autoritePrefecture = new AutoritePrefecture();
        $form = $this->createForm(AutoritePrefectureType::class, $autoritePrefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($autoritePrefecture);
            $em->flush();

            return $this->redirectToRoute('autorite_prefecture_index');
        }

        return $this->render('autorite_prefecture/new.html.twig', [
            'autorite_prefecture' => $autoritePrefecture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="autorite_prefecture_show", methods="GET")
     */
    public function show(AutoritePrefecture $autoritePrefecture): Response
    {
        return $this->render('autorite_prefecture/show.html.twig', ['autorite_prefecture' => $autoritePrefecture]);
    }

    /**
     * @Route("/{id}/edit", name="autorite_prefecture_edit", methods="GET|POST")
     */
    public function edit(Request $request, AutoritePrefecture $autoritePrefecture): Response
    {
        $form = $this->createForm(AutoritePrefectureType::class, $autoritePrefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('autorite_prefecture_edit', ['id' => $autoritePrefecture->getId()]);
        }

        return $this->render('autorite_prefecture/edit.html.twig', [
            'autorite_prefecture' => $autoritePrefecture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="autorite_prefecture_delete", methods="DELETE")
     */
    public function delete(Request $request, AutoritePrefecture $autoritePrefecture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$autoritePrefecture->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($autoritePrefecture);
            $em->flush();
        }

        return $this->redirectToRoute('autorite_prefecture_index');
    }
}
