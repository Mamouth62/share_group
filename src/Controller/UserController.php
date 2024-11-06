<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Repository\ContactRepository;


class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function listeUsers(UserRepository $UserRepository, ContactRepository $ContactRepository): Response
    {
        $users = $UserRepository->findAll();
        $contacts = $ContactRepository->findAll();
        return $this->render('user/liste-users.html.twig', [
            'users'=> $users,
            'contacts'=> $contacts 
        ]);
    }
}
