<?php

namespace App\Controller;

// use App\Entity\Projects;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\{ProjectsRepository, InfoAdminRepository};
use Knp\Component\Pager\PaginatorInterface;

// use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;

class PortfolioController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home(ProjectsRepository $repoProject, InfoAdminRepository $repoAdmin, Request $request, \Swift_Mailer $mailer, PaginatorInterface $pagin)
    {

        ///pagination
        $contenu = $repoProject->findAll();
        $projects = $pagin->paginate($contenu, $request->query->getInt('page', 1), 4);
        ////mail
        $contact = new Contact;
        $formContact = $this->createForm(ContactType::class, $contact);
        $formContact->handleRequest($request);
        if ($formContact->isSubmitted() and $formContact->isValid()) :
            $contact = $formContact->getData();
            $message = (new \Swift_Message('Nouveau mail'))
                ->setFrom($contact->getEmail())
                ->setTo('mailportfolio33@gmail.com')
                ->setBody(
                    $this->renderView(
                        'email/contact.html.twig',
                        ['contact' => $contact]
                    ),
                    'text/html'
                );
            $mailer->send($message);
            $this->addFlash('mail', 'mail envoyer avec succée');
            return $this->redirectToRoute('home');
        endif;
        return $this->render('portfolio/home.html.twig', [
            'projects'  => $projects,
            'profile' => $repoAdmin->find(12651),
            'formContact' => $formContact->createView(),
        ]);
    }
}
