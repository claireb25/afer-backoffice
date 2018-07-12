<?php

namespace App\Controller;

use App\Entity\TypeInfraction;
use App\Form\TypeInfractionType;
use App\Repository\TypeInfractionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/infraction")
 */
class TypeInfractionController extends Controller
{
    /**
     * @Route("/", name="type_infraction_index", methods="GET")
     */
    public function index(TypeInfractionRepository $typeInfractionRepository): Response
    {
        return $this->render('type_infraction/index.html.twig', ['type_infractions' => $typeInfractionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_infraction_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeInfraction = new TypeInfraction();
        $form = $this->createForm(TypeInfractionType::class, $typeInfraction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeInfraction);
            $em->flush();

            return $this->redirectToRoute('type_infraction_index');
        }

        return $this->render('type_infraction/new.html.twig', [
            'type_infraction' => $typeInfraction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_infraction_show", methods="GET")
     */
    public function show(TypeInfraction $typeInfraction): Response
    {
        return $this->render('type_infraction/show.html.twig', ['type_infraction' => $typeInfraction]);
    }

    /**
     * @Route("/{id}/edit", name="type_infraction_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeInfraction $typeInfraction): Response
    {
        $form = $this->createForm(TypeInfractionType::class, $typeInfraction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_infraction_edit', ['id' => $typeInfraction->getId()]);
        }

        return $this->render('type_infraction/edit.html.twig', [
            'type_infraction' => $typeInfraction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_infraction_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeInfraction $typeInfraction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeInfraction->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeInfraction);
            $em->flush();
        }

        return $this->redirectToRoute('type_infraction_index');
    }
}
