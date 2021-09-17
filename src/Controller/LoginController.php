<?php

namespace App\Controller;


// MultiDB
use App\Entity\Authtoken;
use App\Entity\User;
use App\Repository\AuthtokenRepository;
use App\Repository\UserRepository;
use DateTime;
// Controller
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 *  @Route("/login", name="LoginPart")
 */

class LoginController extends AbstractController
{


    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     *  @Route("/Insertion", name="addUser", methods={"POST"})
     */
    public function addUser(Request $req, UserPasswordEncoderInterface $encoder, UserRepository $userRepository)
    {
        $donnes =  json_decode($req->getContent());
        $user = new User();
        $user->setEmailu($donnes->emailu);
        $pass = $encoder->encodePassword($user, $donnes->password);
        $user->setPassword($pass);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->json(['data' => $userRepository->findAll()]);
    }

    /**
     *  @Route("/SignIn", name="SignIn", methods={"POST"})
     */
    public function Register(Request $req, UserPasswordEncoderInterface $encoder, UserRepository $userRepository)
    {
        $donnes =  json_decode($req->getContent());
        $user = new User();
        $user->setEmailu($donnes->User->emailu);
        $pass = $encoder->encodePassword($user, $donnes->User->password);
        $user->setPassword($pass);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        // Create the token
        $users =  $userRepository->findOneByEmailu($donnes->User->emailu);
        $em = $this->getDoctrine()->getManager();
        $authToken = new Authtoken();
        $token = base64_encode(random_bytes(50));
        $hash = hash("sha512", $token);
        $authToken->setToken($hash);
        $authToken->setDatet(new \DateTime('now'));
        $authToken->setEmailu($users);
        $em->persist($authToken);
        $em->flush();
        return $this->json(['data' => $token]);
    }


    /**
     *  @Route("/users/liste", name="UserListe", methods={"GET"})
     */
    public function GetUtilisateur(UserRepository $userRepository)
    {
        return $this->json(['data' => $userRepository->findAll()]);
    }

    /**
     *  @Route("/login", name="Login", methods={"POST"})
     */
    public function Login(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $encoder, AuthtokenRepository $tokens)
    {
        $donnes = json_decode($request->getContent());
        $users =  $userRepository->findOneByEmailu($donnes->username);
        $isPasswordValid = $encoder->isPasswordValid($users, $donnes->password);
        if (!$isPasswordValid) {
            return new Response('Mot de passe incorrect');
        }
        // Create the token
        $em = $this->getDoctrine()->getManager();
        $authToken = new Authtoken();
        $token = base64_encode(random_bytes(50));
        $hash = hash("sha512", $token);
        $authToken->setToken($hash);
        $authToken->setDateT(new \DateTime('now'));
        $authToken->setEmailu($users);
        $em->persist($authToken);
        $em->flush();
        return $this->json(['data' => $token]);
    }
    
    /**
     *  @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout(Request $request, AuthTokenRepository $token)
    {
        $authToken = $token->findOneByToken(hash("sha512", $request->headers->get('X-Auth-Token')));
        if ($authToken) {
            $sauv = $this->getDoctrine()->getManager();
            $sauv->remove($authToken);
            $sauv->flush();
            $date = new DateTime('now');
            $authToken = $token->findExpired($date, $authToken->getEmailu());
            foreach ($authToken as $token) {
                $sauv->remove($token);
                $sauv->flush();
            }
            $response ="Token Removed";
            return $this->json([$response]);
            // return $this->json([$authToken]);
        }
        $response ="Token not found";
        return $this->json([$response]);
    }
}
