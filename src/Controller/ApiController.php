<?php

namespace App\Controller;

//Kernel application

use App\Entity\Andrana;
use App\Entity\Car;
use App\Entity\Client;
use App\Entity\Entrer;
use App\Entity\Garage;
use App\Entity\Sortie;
use App\Entity\Test;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

// Entity
use App\Entity\Utilisateur;
use App\Repository\AndranaRepository;
use App\Repository\CarRepository;
use App\Repository\ClientRepository;
use App\Repository\EntrerRepository;
use App\Repository\GarageRepository;
use App\Repository\SortiequeryRepository;
use App\Repository\SortieRepository;
use App\Repository\TestRepository;
use App\Repository\UserRepository;
//Repository
use App\Repository\UtilisateurRepository;
use DateTime;
//Controllers
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 *  @Route("/api", name="api")
 */

class ApiController extends AbstractController
{

    /**
     *  @Route("/client/liste", name="ClientListe", methods={"GET"})
     */
    public function GetClient(ClientRepository $clientRepository)
    {
        return $this->json(['data' => $clientRepository->findByClientSup(0)]);
    }

    /**
     *  @Route("/client/addClient", name="addClient", methods={"POST"})
     */
    public  function AddClient(Request $req, ClientRepository $liste): Response
    {
        $donnes = json_decode($req->getContent());
        $client = new Client();
        if ($liste->findOneByNomcl($donnes->data->nomcl)) {
            return new Response("This name is already on", 500);
        }
        $client->setNomcl($donnes->data->nomcl);
        $client->setAdrcl($donnes->data->adrcl);
        $client->setClientSup(0);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($client);
        $sauv->flush();
        return $this->json(['data' => $liste->findByClientSup(0)]);
    }

    /**
     *  @Route("/client/EditClient/{idclient}", name="editClient", methods={"PUT"})
     */
    public function EditClient(?Client $client, ?Request $req, ClientRepository $liste): Response
    {
        $donnes = json_decode($req->getContent());

        $client->setNomcl($donnes->data->nomcl);
        $client->setAdrcl($donnes->data->adrcl);
        if ($donnes->data->telcl) $client->setTelcl($donnes->data->telcl);
        $client->setClientSup($donnes->data->clientSup);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($client);
        $sauv->flush();
        return $this->json(['data' => $liste->findByClientSup(0)]);
    }

    /**
     *  @Route("/users/liste", name="UserListe", methods={"GET"})
     */
    public function GetUsers(UserRepository $userRepository)
    {
        return $this->json(['data' => $userRepository->findAll()]);
    }

    /**
     *  @Route("/users/addUser", name="addUser", methods={"POST"})
     */
    public function AddUsers(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $encoder)
    {
        $donnes = json_decode($request->getContent());
        $user = new User();
        $user->setEmailu($donnes->User->emailu);
        $pass = $encoder->encodePassword($user, $donnes->User->password);
        $user->setPassword($pass);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->json(['data' => $userRepository->findAll()]);
    }

    /**
     *  @Route("/users/editUser/{emailu}", name="addUser", methods={"PUT"})
     */
    public function EditUsers(Request $request, UserRepository $userRepository, ?User $user, UserPasswordEncoderInterface $encoder)
    {
        $donnes = json_decode($request->getContent());
        $user->setEmailu($donnes->User->emailu);
        $pass = $encoder->encodePassword($user, $donnes->User->password);
        $user->setPassword($pass);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->json(['data' => $userRepository->findAll()]);
    }

    /**
     *  @Route("/cars/liste", name="Carliste", methods={"GET"})
     */
    public function GetCars(CarRepository $carRepository)
    {
        return $this->json(['data' => $carRepository->findByCarSup(0)]);
    }

    /**
     *  @Route("/Car/addCar", name="addCar", methods={"POST"})
     */
    public function StoreCars(Request $request, CarRepository $carRepository,ClientRepository $clientRepository)
    {
        $donnes = json_decode($request->getContent());
        $car = new Car(); 
        $car->setMatrc($donnes->data->matrc);
        $car->setNomv($donnes->data->nomv);
        $car->setIdclient($clientRepository->findOneByIdclient($donnes->data->idclient->idclient));
        $car->setCouleurc($donnes->data->couleurc);
        $car->setCarSup(0);
        $em = $this->getDoctrine()->getManager();
        $em->persist($car);
        $em->flush();
        return $this->json(['data' => $carRepository->findByCarSup(0)]);
    }

    /**
     *  @Route("/Car/updateCar/{matrc}", name="UpdateCar", methods={"PUT"})
     */
    public function UpdateCars(Request $request,?Car $car, CarRepository $carRepository,ClientRepository $clientRepository)
    {
        $donnes = json_decode($request->getContent());
        $car->setMatrc($donnes->data->matrc);
        $car->setNomv($donnes->data->nomv);
        $car->setIdclient($clientRepository->findOneByIdclient($donnes->data->idclient->idclient));
        $car->setCouleurc($donnes->data->couleurc);
        $car->setCarSup(0);
        $em = $this->getDoctrine()->getManager();
        $em->persist($car);
        $em->flush();
        return $this->json(['data' => $carRepository->findByCarSup(0)]);
    }

     /**
     *  @Route("/Car/deleteCar/{matrc}", name="DeleteCar", methods={"PUT"})
     */
    public function DeleteCar(?Car $car, CarRepository $carRepository)
    {
        $car->setCarSup(1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($car);
        $em->flush();
        return $this->json(['data' => $carRepository->findByCarSup(0)]);
        
    }
    
     /**
     *  @Route("/Garage/liste", name="Garageliste", methods={"GET"})
     */
    public function GarageList(GarageRepository $garageRepository)
    {
        return $this->json(['data' => $garageRepository->findAll()]);
        
    }

     /**
     *  @Route("/Garage/Enter/{matrc}", name="GarageEnter", methods={"POST"})
     */
    public function GarageEnter(Request $request,?Car $car, GarageRepository $garageRepository)
    {
        $donnes = json_decode($request->getContent());
        $enter = new Entrer();
        $enter->setMatrc($car);
        $date = new DateTime($donnes->Date);
        $heure = new DateTime($donnes->Time);
        $enter->setHeureE($heure);
        $enter->setDateE($date);
        $garage = new Garage();
        $garage->setCar($car);
        $em = $this->getDoctrine()->getManager();
        $em->persist($enter);
        $em->flush();
        $em->persist($garage);
        $em->flush();
        return $this->json(['data' => $garageRepository->findAll()]);
    }
    
     /**
     *  @Route("/Garage/Exit/{matrc}", name="GarageExit", methods={"POST"})
     */
    public function GarageExit(Request $request,?Garage $garage,?Car $car, GarageRepository $garageRepository)
    {
        $donnes = json_decode($request->getContent());
        $sortie = new Sortie();
        $sortie->setMatrc($car);
        $heure = new \DateTime($donnes->Time);
        $sortie->setDateS(new DateTime($donnes->Date));
        $sortie->setHeureS($heure);
        $garage->setCar($car);
        $em = $this->getDoctrine()->getManager();
        $em->persist($sortie);
        $em->flush();
        $em->remove($garage);
        $em->flush();
        return $this->json(['data' => $garageRepository->findAll()]);
    }

    /**
     *  @Route("/test", name="test", methods={"GET"})
     */
    public function Test(AndranaRepository $testRepository)
    {
        return $this->json(['data' => $testRepository->findAll()]);
    }

     /**
     *  @Route("/Enter", name="EnterListe", methods={"GET"})
     */
    public function EnterListe(AndranaRepository $entrerRepository)
    {   
        return $this->json(['data' => $entrerRepository->findE()]);
    }

     /**
     *  @Route("/Exit", name="ExitListe", methods={"GET"})
     */
    public function ExitListe(SortiequeryRepository $sortieRepository)
    {
        
        return $this->json(['data' => $sortieRepository->findS()]);
    }
}
