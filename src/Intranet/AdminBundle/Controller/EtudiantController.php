<?php

namespace Intranet\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Intranet\AdminBundle\Entity\Etudiant;
use Intranet\AdminBundle\Entity\Tuteur;
use Intranet\AdminBundle\Entity\Classeetudiant;
use Intranet\AdminBundle\Form\EtudiantType;
use Intranet\AdminBundle\Form\TuteurType;
use OC\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//use Symfony\Component\HttpKernel\Exception\Exception;
class EtudiantController extends Controller{

	public function ajoutAction(Request $request){
    	 // On crée un objet Advert
		    $etud = new Etudiant();

		    $em = $this->getDoctrine()
								->getManager();
		    $repoAnnee = $em->getRepository('IntranetAdminBundle:Anneescolaire');
			$anneeEncours = $repoAnnee->findOneByEncours(true);

			if ($anneeEncours == null) {
		      // Sinon on déclenche une exception « Accès interdit »
		      throw new NotFoundHttpException('Veuillez parametrer certains paramètres : Année en cours ');
		    }

		    $etud->setAnneescolaire($anneeEncours);

		    $form = $this->get('form.factory')
    							->create(new EtudiantType(), $etud);
    							/*
		    // On crée le FormBuilder grâce au service form factory
		    $formBuilder = $this->get('form.factory')->createBuilder('form', $etud);

		    // On ajoute les champs de l'entité que l'on veut à notre formulaire
		    $formBuilder
		      ->add('datenaissance',      'date')
		      ->add('nom',     'text')
		      ->add('prenom',   'text')
		      ->add('matricule',   'text')
		      ->add('email',   'email')
		      ->add('telephone',   'text')
		    ;

		    // À partir du formBuilder, on génère le formulaire
		    $form = $formBuilder->getForm();
		    //*/
		    if ($form->handleRequest($request)->isValid()) {
		      // On l'enregistre notre objet $etud dans la base de données, par exemple
		      $em = $this->getDoctrine()->getManager();

		      // Creation du compte
		    $userManager = $this->container->get('fos_user.user_manager');
		    $user = $userManager->createUser();
		    $user->setUsername($etud->getMatricule());
		    $user->setEmail($etud->getEmail());
		    $user->setEnabled(true);
		    $user->setPlainPassword($etud->getMatricule());
		    $user->setRoles(
		            array(
		                 'ROLE_ETUDIANT'
		            )
		        );
		    $userManager->updateUser($user);
		    //Ajout du compte
		    $etud->setCompte($user);

		      $em->persist($etud);
		      $em->flush();

		      $request->getSession()->getFlashBag()->add('info', 'Etudiant bien enregistrée.');

		      // On redirige vers la page de visualisation de l'annonce nouvellement créée
		      return $this->redirect($this->generateUrl('intranet_admin_voir_etudiant', 
		      	array('id' => $etud->getId())));
		    }
		    

		        return $this->render('IntranetAdminBundle:Etudiant:ajout.html.twig', array(
		      'form' => $form->createView()
		    ));
    }
    /*
    *	MODIFICATION D'UN ETUDIANT
    *
    */
    public function modifierAction($id,Request $request){

    	$etud =  $this->getDoctrine()
		  ->getManager()
		  ->getRepository('IntranetAdminBundle:Etudiant')
		  ->find($id)
		;
			// On crée le FormBuilder grâce au service form factory
	    $formBuilder = $this->get('form.factory')->createBuilder('form', $etud);

	    // On ajoute les champs de l'entité que l'on veut à notre formulaire
	    $formBuilder
	      ->add('datenaissance',      'date')
	      ->add('nom',     'text')
	      ->add('prenom',   'text')
	     // ->add('matricule',   'text')
	      ->add('email',   'email')
	      ->add('telephone',   'text')
	    ;
	    // À partir du formBuilder, on génère le formulaire
	    $form = $formBuilder->getForm();

	    // On fait le lien Requête <-> Formulaire
	    // À partir de maintenant, la variable $etud contient les valeurs entrées dans le formulaire par le visiteur
	    $form->handleRequest($request);

	    if ($form->isValid()) {
	      // On l'enregistre notre objet $etud dans la base de données, par exemple
	      $em = $this->getDoctrine()->getManager();
	      $etud->setDate(new \Datetime());
	      $em->persist($etud);
	      $em->flush();

	      $request->getSession()->getFlashBag()->add('info', 'Etudiant bien modifié.');

	      // On redirige vers la page de visualisation de l'annonce nouvellement créée
	      return $this->redirect($this->generateUrl('intranet_admin_voir_etudiant', 
	      	array('id' => $etud->getId())));
	    }


	    return $this->render('IntranetAdminBundle:Etudiant:ajoutCompte.html.twig', array(
	      'form' => $form->createView()
	    ));

    }



    public function statAction(){

    	return $this->render('IntranetAdminBundle:Etudiant:stat.html.twig', array(
      'datas' => array()
    	));
    }

    

    public function ajoutCompteAction($id,Request $request){
    	$em = $this->getDoctrine()
		  ->getManager();
    	$etud =  $em
		  ->getRepository('IntranetAdminBundle:Etudiant')
		  ->find($id)
		;
				if ($etud == null) {
	      // Sinon on déclenche une exception « Accès interdit »
	      throw new NotFoundHttpException('Identifiant incorrect');
	    }
	    // Creation du compte
	    $userManager = $this->container->get('fos_user.user_manager');
	    $user = $userManager->createUser();
	    $user->setUsername($etud->getMatricule());
	    $user->setEmail($etud->getEmail());
	    $user->setEnabled(true);
	    $user->setPlainPassword($etud->getMatricule());
	    $user->setRoles(
	            array(
	                 'ROLE_ETUDIANT'
	            )
	        );
	    $userManager->updateUser($user);
	    //Ajout du compte
	    $etud->setCompte($user);
	    $em->persist($etud);
	    $em->flush();

	   $request->getSession()->getFlashBag()->add('notice', 'Compte bien enregistrée.');

	      // On redirige vers la page de visualisation de l'annonce nouvellement créée
	      return $this->redirect($this->generateUrl('intranet_admin_voir_etudiant', 
	      	array('id' => $etud->getId())));


    }

    public function definirClasseAction(Request $req,$id){


    	$em = $this->getDoctrine()->getManager();
    	$etud = $em 
		  ->getRepository('IntranetAdminBundle:Etudiant')
		  ->find($id)
		;
		
			if ($etud == null) {
	      // Sinon on déclenche une exception « Accès interdit »
	      throw new NotFoundHttpException('Identifiant incorrect');
	    }
	    $action = "niveau-filiere";
	    $tabReturn = array(
			'etudiant' => $etud,
	      	'action'=>$action,
	      	'filieres'=>$em->getRepository('IntranetAdminBundle:Filiere')->findAll(),
	      	'niveaux'=>$em->getRepository('IntranetAdminBundle:Niveauinscription')->findAll()
	    	);
	    if(!empty($req->query->get('niveau')) 
	    	&&
	    	!empty($req->query->get('filiere'))){
	    	$repoAnnee = $em->getRepository('IntranetAdminBundle:Anneescolaire');
			$anneeEncours = $repoAnnee->findOneByEncours(true);

			if ($anneeEncours == null) {
		      // Sinon on déclenche une exception « Accès interdit »
		      throw new NotFoundHttpException("Veuillez définir l'année en cours !!");
		    }
		    $niveau = $em->getRepository('IntranetAdminBundle:Niveauinscription')->find($req->query->get('niveau'));
		    $filiere = $em->getRepository('IntranetAdminBundle:Filiere')->find($req->query->get('filiere'));
		    
		//     echo '<pre>';
		//  print_r($niveau);
		//  print_r($filiere);
		// echo '</pre>'; 
		//     die('');

		    $classes = $em->getRepository('IntranetAdminBundle:Classe')
		    				->findBy(
		    					array(
		    						'anneescolaire' => $anneeEncours,
		    						'filiere'=>$filiere,
		    						'niveau'=>$niveau
		    						),
						array('created' => 'desc'),100,0);

	    	$tabReturn ["classes"] = $classes;
	    	$tabReturn ["filiere"] = $filiere;
	    	$tabReturn ["niveau"] = $niveau;
	    	

	    }
	    if(!empty($req->request->get('classe'))){
	    	$classe = $em->getRepository('IntranetAdminBundle:Classe')->find($req->request->get('classe'));
	    	$ce = new Classeetudiant();
	    	$ce->setActive(true);
	    	$ce->setDate(new \Datetime());
	    	$ce->setEtudiant($etud);
	    	$ce->setClasse($classe);
	    	$em->persist($ce);
	    	$em->flush();
	    	return $this->redirect($this->generateUrl('intranet_admin_voir_etudiant', 
	      	array('id' => $etud->getId())));
	    }
	    return $this->render('IntranetAdminBundle:Etudiant:definirclasse.html.twig', $tabReturn);
    }


    public function voirAction($id,Request $request){
    	$em = $this->getDoctrine()
		  ->getManager()
		  ;
    	$etud =  $em->getRepository('IntranetAdminBundle:Etudiant')
		  ->find($id)
		;
			if ($etud == null) {
	      // Sinon on déclenche une exception « Accès interdit »
	      throw new NotFoundHttpException('Identifiant incorrect');
	    }
	    $tabe = array('etudiant' => $etud);

	    if($etud->getTuteur() == null){
	    	$tuteur = new Tuteur();
	    	$tuteur->setDate(new \Datetime());
	    	$form = $this->get('form.factory')
    							->create(new TuteurType(), $tuteur);
    		 if ($form->handleRequest($request)->isValid()) {
    		 	$em->persist($tuteur);
    		 	$etud->setTuteur($tuteur);
    		 	$em->flush();

    		 	return $this->redirect($this->generateUrl('intranet_admin_voir_etudiant',array('id'=>$etud->getId())));
    		 }
    		$tabe['form']=$form->createView();
	    }

	    if($etud->getContacturgent() == null){
	    	$tuteuru = new Tuteur();
	    	$tuteuru->setDate(new \Datetime());
	    	$formu = $this->get('form.factory')
    							->create(new TuteurType(), $tuteuru);
    		 if ($formu->handleRequest($request)->isValid()) {
    		 	$em->persist($tuteuru);
    		 	$etud->setContacturgent($tuteuru);
    		 	$em->flush();

    		 	return $this->redirect($this->generateUrl('intranet_admin_voir_etudiant',array('id'=>$etud->getId())));
    		 }
    		$tabe['formu']=$formu->createView();
	    }

	    	return $this->render('IntranetAdminBundle:Etudiant:voir.html.twig', $tabe);
    }

    public function listAction(Request $request){

    	// echo '<pre>';
    	// print_r($request->query);
    	// echo '</pre>';
    	// if(!empty($request->query->get('action'))){
    	// 	echo $request->query->get('action');
    	// }else{
    	// 	echo "pas d'action";
    	// }
    	// die('');
    	$etud =  $this->getDoctrine()
		  ->getManager()
		  ->getRepository('IntranetAdminBundle:Etudiant')
		  ->findAll();
    	return $this->render('IntranetAdminBundle:Etudiant:list.html.twig', array(
      'etudiants' => $etud
    ));
    }
}