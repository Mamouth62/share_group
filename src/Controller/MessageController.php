<?php
namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends AbstractController
{
    // Route pour afficher la boîte de dialogue avec les messages
    #[Route('/message/dialogue', name: 'app_message_dialogue')]
    public function dialogue(MessageRepository $messageRepository): Response
    {
        // Récupérer tous les messages depuis la base de données
        $messages = $messageRepository->findBy([], ['timestamp' => 'ASC']);

        // Passer les messages au template
        return $this->render('chat/dialogue.html.twig', [
            'messages' => $messages,  // Passer les messages à la vue
        ]);
    }

    // Route pour envoyer un message
    #[Route('/message/send', name: 'app_send_message', methods: ['POST'])]
    public function sendMessage(Request $request, EntityManagerInterface $em): Response
    {
        $messageContent = $request->request->get('message');
        
        // Créer et enregistrer un nouveau message
        $message = new Message();
        $message->setContent($messageContent);
        $message->setUser($this->getUser());  // Utilisateur connecté
        $message->setTimestamp(new \DateTime());

        $em->persist($message);
        $em->flush();

        return $this->redirectToRoute('app_message_dialogue');  // Rediriger vers la page du chat
    }
}
