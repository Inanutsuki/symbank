<?php

namespace App\Controller;

use App\Entity\Credit;
use App\Form\CreditType;
use App\Repository\CreditRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/credit")
 */
class CreditController extends AbstractController
{
    /**
     * @Route("/", name="credit_index", methods={"GET"})
     */
    public function index(CreditRepository $creditRepository): Response
    {
        return $this->render('credit/index.html.twig', [
            'credits' => $creditRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="credit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $credit = new Credit();
        $form = $this->createForm(CreditType::class, $credit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($credit);
            $entityManager->flush();

            return $this->redirectToRoute('credit_index');
        }

        return $this->render('credit/new.html.twig', [
            'credit' => $credit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="credit_show", methods={"GET"})
     */
    public function show(Credit $credit): Response
    {
        return $this->render('credit/show.html.twig', [
            'credit' => $credit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="credit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Credit $credit): Response
    {
        $form = $this->createForm(CreditType::class, $credit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('credit_index');
        }

        return $this->render('credit/edit.html.twig', [
            'credit' => $credit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="credit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Credit $credit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$credit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($credit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('credit_index');
    }
}
