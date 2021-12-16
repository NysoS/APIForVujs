<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api")
 */
class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="getAllCategorie", methods="Get")
     */
    public function getAll(SerializerInterface $serializerInterface, CategorieRepository $categorieRepository)
    {
        
        $lstCat = $categorieRepository->findAll();
       
        $serializeData = $serializerInterface->serialize($lstCat,'json',['groups'=>'get:cat']);
        return new Response($serializeData);

    }

    /**
     * @Route("/categorie/{id}", name="getOneCateg", methods="Get")
     */
    public function getOne(SerializerInterface $serializerInterface, CategorieRepository $categorieRepository, Request $request)
    {
        
        $categorie = $categorieRepository->findOneBy(['id' =>$request->get('id')]);
       
        $serializeData = $serializerInterface->serialize($categorie,'json',['groups'=>'get:cat']);
        return new Response($serializeData);

    }

    /**
     * @Route("/categorie", name="addOneCateg", methods="Post")
     */
    public function addOne(SerializerInterface $serializerInterface,CategorieRepository $categorieRepository,  Request $request, EntityManagerInterface $em)
    {
        
        $catJson = json_decode($request->getContent());
       
        $cat = new Categorie();

        $cat->setNomCat($catJson->nomCat);
        $cat->setDescriptionCat($catJson->descCat);

        $em->persist($cat);
        $em->flush();

        $serializeData = $serializerInterface->serialize($cat,'json',['groups'=>['groups'=>'get:cat']]);
        return new Response($serializeData);

    }

    /**
     * @Route("/categorie/{id}", name="delArticle", methods="Delete")
     */
    public function DeldOne(SerializerInterface $serializerInterface,CategorieRepository $categorieRepository, Request $request, EntityManagerInterface $em)
    {
        $cat = $categorieRepository->findOneBy($request->get("id"));
      
        $em->remove($cat);
        $em->flush();

        $serializeData = $serializerInterface->serialize($cat,'json',['groups'=>['groups'=>'get:cat']]);
        return new Response($serializeData);

    }
}
