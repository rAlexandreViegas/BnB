<?php

namespace App\Controller;

use App\Entity\Room;
use App\Repository\RoomRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/r')]
class RoomController extends AbstractController
{
    #[Route('/', name: 'app_room')]
    public function index(
        Request $request,
        RoomRepository $roomRepository,
        PaginatorInterface $paginator
    ): Response {
        $pagination = $paginator->paginate(
            $roomRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            9 /*limit per page*/
        );

        $hostPagination = $paginator->paginate(
            $roomRepository->findBy(
                ['host' => $this->getUser()],
            ),
            $request->query->getInt('page', 1), /*page number*/
            9 /*limit per page*/
        );

        return $this->render('room/index.html.twig', [
            'rooms' => $pagination,
            'hostRooms' => $hostPagination
        ]);
    }

    #[Route('/details/{id}', name: 'room', methods: ['GET', 'POST'])]
    public function details(
        Room $room,
    ): Response {
        return $this->render('room/details.html.twig', [
            'room' => $room,
        ]);
    }
}
