<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
    * @Route("/api", name="article")
*/
class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="getAllArticle", methods="Get")
     */
    public function getAll(SerializerInterface $serializerInterface, ArticleRepository $articleRepository)
    {
        
        $lstArticle = $articleRepository->findAll();
       
        $serializeData = $serializerInterface->serialize($lstArticle,'json',['groups'=>['get:article','get:cat']]);
        return new Response($serializeData);

    }

    /**
     * @Route("/article/{id}", name="getOneArticle", methods="Get")
     */
    public function getOne(SerializerInterface $serializerInterface, ArticleRepository $articleRepository, Request $request)
    {
        
        $Article = $articleRepository->findOneBy(['id' =>$request->get('id')]);
       
        $serializeData = $serializerInterface->serialize($Article,'json',['groups'=>['get:article','get:cat']]);
        return new Response($serializeData);

    }

    /**
     * @Route("/article", name="addOneArticle", methods="Post")
     */
    public function addOne(SerializerInterface $serializerInterface,CategorieRepository $categorieRepository,  Request $request, EntityManagerInterface $em)
    {
        
        $articleJson = json_decode($request->getContent());
       
        $articleRepository = new Article();

        $articleRepository->setNom($articleJson->nom);
        $articleRepository->setDescription($articleJson->description);
        $articleRepository->setPrix($articleJson->prix);
        $articleRepository->setIsEnStock($articleJson->isEnStock);
        $articleRepository->setPaysOrigin($articleJson->paysOrigin);
        $articleRepository->setCategorie($categorieRepository->findOneBy(['id'=>$articleJson->categorie_id]));

        $em->persist($articleRepository);
        $em->flush();

        $serializeData = $serializerInterface->serialize($articleRepository,'json',['groups'=>['get:article','get:cat']]);
        return new Response($serializeData);

    }

    /**
     * @Route("/article/{id}", name="delArticle", methods="Delete")
     */
    public function DeldOne(SerializerInterface $serializerInterface,ArticleRepository $articleRepository, Request $request, EntityManagerInterface $em)
    {
        $article = $articleRepository->findOneBy($request->get("id"));
      
        $em->remove($article);
        $em->flush();

        $serializeData = $serializerInterface->serialize($article,'json',['groups'=>['get:article','get:cat']]);
        return new Response($serializeData);

    }
}
