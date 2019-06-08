<?php

namespace App\Controller;

use App\Entity\Orderr;
use App\Form\OrderrType;
use App\Repository\OrderrRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/orderr")
 */
class OrderrController extends AbstractController
{
    /**
     * @Route("/", name="orderr_index", methods={"GET"})
     */
    public function index(OrderrRepository $orderrRepository): Response
    {
        return $this->render('orderr/index.html.twig', [
            'orderrs' => $orderrRepository->findAll(),
        ]);
    }

    /**
     * @Route("/dakovnaStranka", name="dakovna_stranka", methods={"GET"})
     */
    public function dakovnaStranka()
    {
        return $this->render('orderr/dakovnaStranka.html.twig');
    }



    /**
     * @Route("/new", name="orderr_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $orderr = new Orderr();
        $form = $this->createForm(OrderrType::class, $orderr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($orderr);
            $entityManager->flush();

            return $this->redirectToRoute('dakovna_stranka');
        }

        return $this->render('orderr/new.html.twig', [
            'orderr' => $orderr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="orderr_show", methods={"GET"})
     */
    public function show(Orderr $orderr): Response
    {
        return $this->render('orderr/show.html.twig', [
            'orderr' => $orderr,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="orderr_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Orderr $orderr): Response
    {
        $form = $this->createForm(OrderrType::class, $orderr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('orderr_index', [
                'id' => $orderr->getId(),
            ]);
        }

        return $this->render('orderr/edit.html.twig', [
            'orderr' => $orderr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="orderr_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Orderr $orderr): Response
    {
        if ($this->isCsrfTokenValid('delete'.$orderr->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($orderr);
            $entityManager->flush();
        }

        return $this->redirectToRoute('orderr_index');
    }
}
