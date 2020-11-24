<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Credit;
use App\Repository\ClientRepository;
use App\Repository\CreditRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/home.html.twig', [
            'current_page' => 'home',
        ]);
    }

    /**
     * @Route("/list-clients", name="client_index")
     */
    public function listClients(ClientRepository $repo)
    {
        $clients = $repo->findAll();

        return $this->render('client/index.html.twig', [
            'current_page' => 'show_client',
            'clients' => $clients
        ]);
    }
    // /**
    //  * @Route("/client/{id}", name="client_show")
    //  */
    // public function showClient(ClientRepository $repo, Client $client,Credit $credit, $id)
    // {
    //     $clientInfo = $repo->find($id);


    //     if ($client->getId() == $id) {
    //         return $this->render('client_show.html.twig', [
    //             'clientInfo' => $clientInfo,
    //             'credit' => $credit
    //         ]);
    //     };

    //     return $this->redirectToRoute('list_clients');
    // }
}
