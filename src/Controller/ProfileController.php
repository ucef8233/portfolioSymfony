<?php

namespace App\Controller;

use App\Entity\InfoAdmin;
use App\Repository\InfoAdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    /**
     * @Route("/dashboard/profile",name="dashboard_profile")
     */
    public function profile(InfoAdmin $profile, InfoAdminRepository $repo, Request $request)
    {
        $profile = $repo->find(12650); /// a modifier
        $formProfile = $this->createForm(AdminType::class, $profile);
        $formProfile->handleRequest($request);
        // if ($formProfile->isSubmitted() and $formProfile->isValid()) :
        //     $manager->persist($profile);
        //     $manager->flush();
        //     return $this->redirectToRoute('dashboard_profile');
        // endif;
        return $this->render('dashboard/profile.html.twig', [
            'formProfile' => $formProfile->createView(),
            'profile' => $profile
        ]);
    }
}
