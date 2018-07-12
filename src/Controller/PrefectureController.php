<?php

namespace App\Controller;

use App\Entity\Prefecture;
use App\Form\PrefectureType;
use App\Repository\PrefectureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prefecture")
 */
class PrefectureController extends Controller
{
    /**
     * @Route("/", name="prefecture_index", methods="GET")
     */
    public function index(PrefectureRepository $prefectureRepository): Response
    {
        return $this->render('prefecture/index.html.twig', ['prefectures' => $prefectureRepository->findAll()]);
    }

    /**
     * @Route("/new", name="prefecture_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $prefecture = new Prefecture();
        $form = $this->createForm(PrefectureType::class, $prefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prefecture);
            $em->flush();

            return $this->redirectToRoute('prefecture_index');
        }

        return $this->render('prefecture/new.html.twig', [
            'prefecture' => $prefecture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prefecture_show", methods="GET")
     */
    public function show(Prefecture $prefecture): Response
    {
        return $this->render('prefecture/show.html.twig', ['prefecture' => $prefecture]);
    }

    /**
     * @Route("/{id}/edit", name="prefecture_edit", methods="GET|POST")
     */
    public function edit(Request $request, Prefecture $prefecture): Response
    {
        $form = $this->createForm(PrefectureType::class, $prefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prefecture_edit', ['id' => $prefecture->getId()]);
        }

        return $this->render('prefecture/edit.html.twig', [
            'prefecture' => $prefecture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prefecture_delete", methods="DELETE")
     */
    public function delete(Request $request, Prefecture $prefecture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prefecture->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prefecture);
            $em->flush();
        }

        return $this->redirectToRoute('prefecture_index');
    }
}
