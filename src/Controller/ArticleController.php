<?php

namespace App\Controller;

use App\Entity\Article;
use App\Symfony\ErrorBag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", methods={"PUT"}, name="article")
     */
    public function index(SerializerInterface $serializer, Request $request, ValidatorInterface $validator)
    {
        $article = $serializer->deserialize(
            $request->getContent(),
            Article::class,
            'json',
            ['error_bag' => $errorBag = new ErrorBag()]
        );

        $errors = [];

        foreach ($errorBag->getErrors() as $error) {
            $errors[] = $error;
        }

        $violations = $validator->validate($article);

        foreach ($violations as $violation) {
            $errors[] = $violation->getMessage();
        }

        return $this->json([
            'message' => 'The article was deserialized ! :)',
            'article' => $article,

            // Of course here context (property name) is missing. But remember, it's just some kind of demonstration.
            'errors' => $errors
        ]);
    }
}
