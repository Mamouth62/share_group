<?php
namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Contact;
use App\Form\CategorieType;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CatégorieRepository;


class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
        ]);
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $contact->setDateEnvoi(new \Datetime());
                $em->persist($contact);
                $em->flush();
                $this->addFlash('notice', 'Message envoyé');
                return $this->redirectToRoute('app_contact');
            }
        }
        return $this->render('base/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('//private-categorie', name: 'app_categorie')]
    public function categorie(Request $request, EntityManagerInterface $em): Response
    {
        $catégorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $catégorie);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($catégorie);
                $em->flush();
                $this->addFlash('notice', 'Catégorie Ajouté');
                return $this->redirectToRoute('app_categorie');
            }
        }
        return $this->render('categorie/categorie.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
