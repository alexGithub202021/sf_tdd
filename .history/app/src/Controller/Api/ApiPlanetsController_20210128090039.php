<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PlanetsRepository;
use App\Mapper\PlanetsMapper;

/**
 * @Route("/api")
 */
class ApiPlanetsController extends AbstractController
{

    private $planetsRepository;

    public function __construct(planetsRepository $planetsRepository)
    {
        $this->planetsRepository = $planetsRepository;
    }

    /**
     * @Route("/planets", methods="GET")
     */
    public function getPlanets(): Response
    {
        // phpinfo();
        $planets = $this->planetsRepository->findAll();
        if (!$planets) {
            throw new HttpException(404, "Ressource not found");
        }
        $result = PlanetsMapper::transform($planets);
        return new JsonResponse($result);
    }

    /**
     * @Route("/planets/{id}", methods="GET")
     */
    public function getPlanetById(int $id): Response
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }
        $planets = $this->planetsRepository->findOneBy(['idPlanet' => $id]);
        if (!$planets) {
            throw new HttpException(404, "Ressource not found");
        }
        $result = PlanetsMapper::transform(array($planets));
        return new JsonResponse($result);
    }

    /**
     * @Route("/planets", methods="POST")
     */
    public function addPlanet(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        if ($this->isValidData($data)) {
            $newplanets = PlanetsMapper::getNewplanet($data);
            $this->planetsRepository->addPlanet($newplanets);
        }

        // check Add ok
        return $this->getPlanets();
    }

    /**
     * @Route("/planets/{id}", methods="PUT")
     */
    public function updatePlanet(Request $request, int $id): Response
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }
        $planets = $this->planetsRepository->find($id);
        $data = json_decode($request->getContent(), true);

        if (empty($data['Name']) || empty($data['Color']) || empty($data['Diametre'])) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        } elseif ($data['Diametre'] < 0) {
            throw new HttpException(400, "Invalid parameter : Diametre must be positive number");
        }

        if ($this->isValidData($data)) {
            $this->planetsRepository->updatePlanet($planets, $data);
        }

        return $this->getPlanetById($id);
    }

    /**
     * @Route("/planets/{id}", methods="DELETE")
     */
    public function deletePlanet(int $id): Response
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $planets = $this->planetsRepository->findOneBy(['idPlanet' => $id]);

        if (!$planets) {
            throw new HttpException(400, "Invalid parameter: id not found");
        }

        $this->planetsRepository->removePlanet($planets);

        // check deletion ok
        $planets = $this->planetsRepository->findOneBy(['idPlanet' => $id]);
        $result = !$planets ? ['status' => 'planet deleted'] : ['status' => 'deletion failed'];

        return new JsonResponse($result);
    }

    private function isValidData($data)
    {
        if (empty($data['Name']) || empty($data['Color']) || empty($data['Diametre'])) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        } elseif ($data['Diametre'] < 0) {
            throw new HttpException(400, "Invalid parameter : Diametre must be positive number");
        }
        return true;
    }
}
