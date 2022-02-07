<?php

namespace App\Controller;

use App\Entity\Chambres;
use App\Form\ChambresType;
use App\Repository\ChambresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chambres")
 */
class ChambresController extends AbstractController
{
    /**
     * @Route("/", name="chambres_index", methods={"GET"})
     */
    public function index(ChambresRepository $chambresRepository): Response
    {
        return $this->render('chambres/index.html.twig', [
            'chambres' => $chambresRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="chambres_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $chambre = new Chambres();
        $form = $this->createForm(ChambresType::class, $chambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($chambre);
            $entityManager->flush();

            return $this->redirectToRoute('chambres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chambres/new.html.twig', [
            'chambre' => $chambre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chambres_show", methods={"GET"})
     */
    public function show(Chambres $chambre): Response
    {
        return $this->render('chambres/show.html.twig', [
            'chambre' => $chambre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chambres_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Chambres $chambre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ChambresType::class, $chambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('chambres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chambres/edit.html.twig', [
            'chambre' => $chambre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chambres_delete", methods={"POST"})
     */
    public function delete(Request $request, Chambres $chambre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chambre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($chambre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chambres_index', [], Response::HTTP_SEE_OTHER);
    }
}
