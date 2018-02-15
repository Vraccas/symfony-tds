<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ContactSessionManager;
use App\Entity\Contact;
use App\Entity\ContactBis;
use App\Repository\ContactBisRepository;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\RegistryInterface;


class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(ContactSessionManager $sessionManager, ContactRepository $repo)
    {
        // replace this line with your own code!
        //return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
        
        //$sessionManager = new ContactSessionManager(SessionInterface $session);
        //return new Response('Ah!');
        //$sessionManager->insert(new Contact('MALINO', 'Colino', 'apero@override.com', '000000', '111111'));
        //$sessionManager->updateSession(null);
        
        return $this->render('contacts/base.html.twig', ["contactManager" => $sessionManager]);
        
    }
    
    /**
     * @Route ("/contact/new", name="new_contact")
     */
    public function actionNew(ContactSessionManager $sessionManager, Request $request, ContactRepository $repo){
        
        $contact = new Contact('a', 'b');
        
        $form = $this->createFormBuilder($contact)
                ->add('nom', TextType::class)
                ->add('prenom', TextType::class)
                ->add('email', TextType::class)
                ->add('tel', TextType::class)
                ->add('mobile', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Create '))
                ->getForm();
       
         $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $contact = $form->getData();

            $sessionManager->insertion($contact);
            $repo->insertion($contact);

            //return $this->render('contacts/base.html.twig', ['contactManager'=>$sessionManager]);
            return $this->redirectToRoute('contact', ['contactManager'=>$sessionManager]);
        }
    
        return $this->render('contacts/creation.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route ("/contact/edit/{index}", name="edit_contact")
     */
    public function actionEdit(ContactSessionManager $sessionManager, Request $request, $index, ContactRepository $repo){
        
        $contact = $sessionManager->get($index);
        $form = $this->createFormBuilder($contact)
                ->add('nom', TextType::class)
                ->add('prenom', TextType::class)
                ->add('email', TextType::class)
                ->add('tel', TextType::class)
                ->add('mobile', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Modify '))
                ->getForm();
       
         $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $contactModif = $form->getData();
            //$contact->setNom($contact->getNom());
            //$contact->setPrenom($contact->getPrenom());
            $donnees = [
                'nom' => $contactModif->getNom(),
                'prenom' => $contactModif->getPrenom(),
                'email' => $contactModif->getEmail(),
                'tel' => $contactModif->getTel(),
                'mobile' => $contactModif->getMobile(),                
            ];
            //$sessionManager->insert($contactModif);
            //$sessionManager->update($contact, $donnees);
            $repo->update($contact, $donnees);

            //return $this->render('contacts/base.html.twig', ['contactManager'=>$sessionManager]);
            return $this->redirectToRoute('contact', ['contactManager'=>$sessionManager]);
        }
        return $this->render('contacts/edition.html.twig', ['form' => $form->createView(), 'contact'=>$contact]);
    }
    
    /**
     * @Route ("/contact/update", name="update_contact")
     */
    public function actionUpdate(){//TODO : On doit utiliser la méthode POST
        return new Response('Page de mise à jour du contact');
    }
    
    /**
     * @Route ("/contact/display/{index}", name="display_contact")
     */
    public function actionDisplay(ContactSessionManager $sessionManager, $index){
      //  $contact = $sessionManager->get($index);
        
        //return $this->render('contacts/details.html.twig', ['contact'=>$contact]);
        return $this->render('contacts/details.html.twig', ['session'=>$sessionManager, 'index'=>$index]);
    }
    
    /**
     * @Route ("/contact/search", name="search_contact")
     */
    public function actionSearch(){//TODO : On doit utiliser la méthode POST
        
        
        return new Response('Page de recherche');
    }
    
    /**
     * @Route ("/contact/select", name="select_contact")
     */
    public function actionSelect(){//TODO : On doit utiliser la méthode POST
        return new Response('Page de sélection d\'un contact');
    }
    
    /**
     * @Route ("/contact/delete", name="delete_contact", methods="POST")
     */
    public function actionDelete(ContactSessionManager $sessionManager){//TODO : On doit utiliser la méthode POST
        $sessionManager->delete(array($_POST["id"]));
        return $this->redirectToRoute('contact', ['contactManager'=>$sessionManager]);
    }

}
