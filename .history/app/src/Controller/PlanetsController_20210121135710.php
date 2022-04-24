<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlanetsRepository;
use App\Entity\Planets;

class PlanetsController extends AbstractController
{
    /**
     * @Route("/planets", name="planets_index")
     */
    public function getPlanets(PlanetsRepository $repo): Response
    {
        return $this->render('planets/index.html.twig', [
            'planets' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/{idPlanet}", name="planet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Planets $planet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planet->getIdplanet(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($planet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('planets_index');
    }

    /**
     * @Route("/{idPlanet}", name="planet_show", methods={"GET"})
     */
    public function show(Planets $planet): Response
    {
        return $this->render('planets/show.html.twig', [
            'planet' => $planet,
        ]);
    }    
}