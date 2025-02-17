<?php

// src/Controller/TagController.php

namespace App\Controller;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    // Display the tags and allow adding, editing, and deleting
    #[Route('/tags', name: 'app_tags')]
    public function index(TagRepository $tagRepository): Response
    {
        $tags = $tagRepository->findAll();

        return $this->render('tag/index.html.twig', [
            'tags' => $tags,
        ]);
    }

    // Add a new tag
    #[Route('/tag/new', name: 'app_tag_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tag = new Tag();

        // Handle form submission for new tag creation
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $tag->setName($name);
            $entityManager->persist($tag);
            $entityManager->flush();

            return $this->redirectToRoute('app_tags');
        }

        return $this->render('tag/index.html.twig');
    }

    // Delete a tag
    #[Route('/tag/delete/{id}', name: 'app_tag_delete')]
    public function delete(Tag $tag, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($tag);
        $entityManager->flush();

        return $this->redirectToRoute('app_tags');
    }

    // Edit a tag
    #[Route('/tag/edit/{id}', name: 'app_tag_edit')]
    public function edit(Tag $tag, Request $request, EntityManagerInterface $entityManager): Response
    {
        // If the form is submitted
        if ($request->isMethod('POST')) {
            $tag->setName($request->request->get('name'));
            $entityManager->flush();

            return $this->redirectToRoute('app_tags');
        }

        return $this->render('tag/edit.html.twig', [
            'tag' => $tag,
        ]);
    }
}
