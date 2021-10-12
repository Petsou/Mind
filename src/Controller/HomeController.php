<?php

namespace App\Controller;

use App\Entity\Conducteur;
use App\Form\ConducteurformType;
use App\Repository\ConducteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, ConducteurRepository $conducteurRepository): Response
    {

        //$datas = $this->getDoctrine()->getRepository(Conducteur::class)->findAll();
        $donnees = $conducteurRepository->findAll(); // $conducteurRepository fait la même chose que $this->getDoctrine()->getRepository(Conducteur::class)
        //dd($datas);

        $conduct = new Conducteur;
        $form = $this->createForm(ConducteurformType::class, $conduct);
        
        return $this->render('home/index.html.twig', [
            'conducteurs' => $donnees,
            'form' => $form->createView()
        ]);
    }


}
