<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    public function __construct(
        EntityManagerInterface $em,
        ProfilRepository $pripo

    ){
        $this->em=$em;
        $this->pripo=$pripo;
    }
    
    /**
     * @Route(
     *     name="get_profil",
     *     path="/api/admin/profils/{id}/users",
     *     methods={"GET"},
     *     defaults={
     *          "__controller"="App\Controller\ProfilController::add",
     *          "__api_resource_class"=Profil::class,
     *          "__api_collection_operation_name"="get_profils_users"
     *     }
     * )
     */

    public function profil_user(int $id){
        //$profil= $em->pripo->find($id);
        $profil= $this->em->getRepository(Profil::class)->find($id);

        return $this->json($profil, 200);
    }

     /**
     * @Route(
     *     name="get_profil",
     *     path="/api/admin/profils/{id}",
     *     methods={"GET"},
     *     defaults={
     *          "__controller"="App\Controller\ProfilController::add",
     *          "__api_resource_class"=Profil::class,
     *          "__api_collection_operation_name"="archivage_profils"
     *     }
     * )
     */

    public function Archivageprofil(int $id){
        //$profil= $em->pripo->find($id);
        //$profil= $this->em->getRepository(Profil::class)->find($id);

        return $this->json("profil", 200);
    }
}
