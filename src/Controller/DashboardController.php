<?php

namespace App\Controller;

use App\Entity\InfoAdmin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\{ProjectsRepository, InfoAdminRepository};
use App\Entity\Projects;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\{TextType, FileType};
use App\Form\ProjectsType;
use App\Form\AdminType;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(ProjectsRepository $repo)
    {
        $projects = $repo->findAll();
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'projects'  => $projects
        ]);
    }
    /**
     * @Route("/dashboard/add", name="dashboard_add")
     * @Route("/dashboard/edit/{id}", name="dashboard_edit")
     */
    public function add(Request $request, ObjectManager $manager, Projects $project = null)
    {
        if (!$project)
            $project = new Projects;
        $form  = $this->createForm(ProjectsType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) :
            $manager->persist($project);
            $manager->flush();
            return $this->redirectToRoute('dashboard');
        endif;
        return $this->render('dashboard/add.html.twig', [
            'formProject' => $form->createView(),
            'editMode' => $project->getId() !== null
        ]);
    }
    /**
     * @Route("/dashboard/profile",name="dashboard_profile")
     */
    public function profile(Request $request, ObjectManager $manager, InfoAdminRepository $repo)
    {
        $profile = $repo->find(12650);
        // dump($profile);
        $formProfile = $this->createForm(AdminType::class, $profile);
        $formProfile->handleRequest($request);
        if ($formProfile->isSubmitted() and $formProfile->isValid()) :
            $manager->persist($profile);
            $manager->flush();
            return $this->redirectToRoute('dashboard/profile');
        endif;
        return $this->render('dashboard/profile.html.twig', [
            'formProfile' => $formProfile->createView()
        ]);
    }
}
