<?php

namespace App\Controller;

use App\Entity\SuiviDossier;
use App\Form\SuiviDossierType;
use App\Repository\SuiviDossierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/suivi/dossier")
 */
class SuiviDossierController extends Controller
{
    /**
     * @Route("/", name="suivi_dossier_index", methods="GET")
     */
    public function index(SuiviDossierRepository $suiviDossierRepository): Response
    {
        return $this->render('suivi_dossier/index.html.twig', ['suivi_dossiers' => $suiviDossierRepository->findAll()]);
    }

    /**
     * @Route("/new", name="suivi_dossier_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $suiviDossier = new SuiviDossier();
        $form = $this->createForm(SuiviDossierType::class, $suiviDossier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($suiviDossier);
            $em->flush();

            return $this->redirectToRoute('suivi_dossier_index');
        }

        return $this->render('suivi_dossier/new.html.twig', [
            'suivi_dossier' => $suiviDossier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suivi_dossier_show", methods="GET")
     */
    public function show(SuiviDossier $suiviDossier): Response
    {
        return $this->render('suivi_dossier/show.html.twig', ['suivi_dossier' => $suiviDossier]);
    }

    /**
     * @Route("/{id}/edit", name="suivi_dossier_edit", methods="GET|POST")
     */
    public function edit(Request $request, SuiviDossier $suiviDossier): Response
    {
        $form = $this->createForm(SuiviDossierType::class, $suiviDossier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('suivi_dossier_edit', ['id' => $suiviDossier->getId()]);
        }

        return $this->render('suivi_dossier/edit.html.twig', [
            'suivi_dossier' => $suiviDossier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suivi_dossier_delete", methods="DELETE")
     */
    public function delete(Request $request, SuiviDossier $suiviDossier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suiviDossier->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($suiviDossier);
            $em->flush();
        }

        return $this->redirectToRoute('suivi_dossier_index');
    }
}
