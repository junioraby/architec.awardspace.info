<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/intranet-change-p')) {
            // intranet_change_picture
            if ($pathinfo === '/intranet-change-picture') {
                return array (  '_controller' => 'Outil\\ServiceBundle\\Controller\\DefaultController::pictureAction',  '_route' => 'intranet_change_picture',);
            }

            // intranet_change_password
            if ($pathinfo === '/intranet-change-password') {
                return array (  '_controller' => 'Outil\\ServiceBundle\\Controller\\DefaultController::passewordAction',  '_route' => 'intranet_change_password',);
            }

        }

        // intranet_change_message
        if ($pathinfo === '/message-box') {
            return array (  '_controller' => 'Outil\\ServiceBundle\\Controller\\DefaultController::messageAction',  '_route' => 'intranet_change_message',);
        }

        if (0 === strpos($pathinfo, '/espace-')) {
            // intranet_professeur_homepage
            if ($pathinfo === '/espace-professeur/accueil') {
                return array (  '_controller' => 'Intranet\\ProfesseurBundle\\Controller\\DefaultController::indexAction',  '_route' => 'intranet_professeur_homepage',);
            }

            if (0 === strpos($pathinfo, '/espace-etudiant')) {
                // intranet_etudiant_homepage
                if ($pathinfo === '/espace-etudiant/accueil') {
                    return array (  '_controller' => 'Intranet\\EtudiantBundle\\Controller\\DefaultController::indexAction',  '_route' => 'intranet_etudiant_homepage',);
                }

                if (0 === strpos($pathinfo, '/espace-etudiant/m')) {
                    // intranet_etudiant_compte
                    if ($pathinfo === '/espace-etudiant/mon-compte') {
                        return array (  '_controller' => 'Intranet\\EtudiantBundle\\Controller\\DefaultController::compteAction',  '_route' => 'intranet_etudiant_compte',);
                    }

                    if (0 === strpos($pathinfo, '/espace-etudiant/ma-classe')) {
                        // intranet_etudiant_ma_classe
                        if (preg_match('#^/espace\\-etudiant/ma\\-classe/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_etudiant_ma_classe')), array (  '_controller' => 'Intranet\\EtudiantBundle\\Controller\\DefaultController::classeAction',));
                        }

                        if (0 === strpos($pathinfo, '/espace-etudiant/ma-classe-actuelle')) {
                            // intranet_etudiant_ma_classe_actuelle
                            if ($pathinfo === '/espace-etudiant/ma-classe-actuelle') {
                                return array (  '_controller' => 'Intranet\\EtudiantBundle\\Controller\\DefaultController::classeActuelleAction',  '_route' => 'intranet_etudiant_ma_classe_actuelle',);
                            }

                            // intranet_etudiant_ma_classe_actuelle_edt
                            if ($pathinfo === '/espace-etudiant/ma-classe-actuelle-emploi-de-temps') {
                                return array (  '_controller' => 'Intranet\\EtudiantBundle\\Controller\\DefaultController::emploitdetempsCAAction',  '_route' => 'intranet_etudiant_ma_classe_actuelle_edt',);
                            }

                        }

                    }

                    // intranet_etudiant_message
                    if ($pathinfo === '/espace-etudiant/message-box') {
                        return array (  '_controller' => 'Intranet\\EtudiantBundle\\Controller\\DefaultController::messageAction',  '_route' => 'intranet_etudiant_message',);
                    }

                }

            }

        }

        // internetsite_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'internetsite_homepage');
            }

            return array (  '_controller' => 'Internet\\siteBundle\\Controller\\SiteController::indexAction',  '_route' => 'internetsite_homepage',);
        }

        // internetsite_add_email_newsletter
        if ($pathinfo === '/ajouter-email-a-la-newsletter') {
            return array (  '_controller' => 'Internet\\siteBundle\\Controller\\SiteController::addemailAction',  '_route' => 'internetsite_add_email_newsletter',);
        }

        // internetsite_add_preinscription
        if ($pathinfo === '/se-preinscrire') {
            return array (  '_controller' => 'Internet\\siteBundle\\Controller\\SiteController::preinscrireAction',  '_route' => 'internetsite_add_preinscription',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // intranet_admin_homepage
            if ($pathinfo === '/admin/test-admin') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'intranet_admin_homepage',);
            }

            // intranet_admin_accueil
            if ($pathinfo === '/admin/accueil') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\DefaultController::accueilAction',  '_route' => 'intranet_admin_accueil',);
            }

            // intranet_admin_upload
            if ($pathinfo === '/admin/upload-file') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\DefaultController::addAction',  '_route' => 'intranet_admin_upload',);
            }

            // intranet_admin_recherche
            if ($pathinfo === '/admin/search') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\DefaultController::rechercheAction',  '_route' => 'intranet_admin_recherche',);
            }

            // intranet_admin_parametage
            if ($pathinfo === '/admin/paramtrage') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\DefaultController::paramtereAction',  '_route' => 'intranet_admin_parametage',);
            }

            // intranet_admin_details_annee
            if (0 === strpos($pathinfo, '/admin/details') && preg_match('#^/admin/details/(?P<annee>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_details_annee')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\DefaultController::detailsanneeAction',));
            }

            // intranet_admin_ajout_etudiant
            if ($pathinfo === '/admin/ajout-etudiant') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\EtudiantController::ajoutAction',  '_route' => 'intranet_admin_ajout_etudiant',);
            }

            // intranet_admin_stat_etudiant
            if ($pathinfo === '/admin/details-etudiant') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\EtudiantController::statAction',  '_route' => 'intranet_admin_stat_etudiant',);
            }

            // intranet_admin_voir_etudiant
            if (0 === strpos($pathinfo, '/admin/voir-etudiant') && preg_match('#^/admin/voir\\-etudiant/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_voir_etudiant')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\EtudiantController::voirAction',));
            }

            // intranet_admin_modifier_etudiant
            if (0 === strpos($pathinfo, '/admin/modifier-etudiant') && preg_match('#^/admin/modifier\\-etudiant/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_modifier_etudiant')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\EtudiantController::modifierAction',));
            }

            // intranet_admin_liste_etudiant
            if ($pathinfo === '/admin/lister-etudiant') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\EtudiantController::listAction',  '_route' => 'intranet_admin_liste_etudiant',);
            }

            // intranet_admin_ajout_compte_etudiant
            if (0 === strpos($pathinfo, '/admin/ajout-compte-utilisateur') && preg_match('#^/admin/ajout\\-compte\\-utilisateur/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_ajout_compte_etudiant')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\EtudiantController::ajoutCompteAction',));
            }

            // intranet_admin_ajout_classe_etudiant
            if (0 === strpos($pathinfo, '/admin/definir-classe-etudiant') && preg_match('#^/admin/definir\\-classe\\-etudiant/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_ajout_classe_etudiant')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\EtudiantController::definirClasseAction',));
            }

            // intranet_admin_ajout_professeur
            if ($pathinfo === '/admin/ajout-professeur') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ProfesseurController::ajoutAction',  '_route' => 'intranet_admin_ajout_professeur',);
            }

            // intranet_admin_stat_professeur
            if ($pathinfo === '/admin/details-professeur') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ProfesseurController::statAction',  '_route' => 'intranet_admin_stat_professeur',);
            }

            // intranet_admin_voir_professeur
            if (0 === strpos($pathinfo, '/admin/voir-professeur') && preg_match('#^/admin/voir\\-professeur/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_voir_professeur')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ProfesseurController::voirAction',));
            }

            // intranet_admin_ajout_compte_professeur
            if (0 === strpos($pathinfo, '/admin/ajout-compte-utilisateur-professeur') && preg_match('#^/admin/ajout\\-compte\\-utilisateur\\-professeur/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_ajout_compte_professeur')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ProfesseurController::ajoutCompteAction',));
            }

            // intranet_admin_modifier_professeur
            if (0 === strpos($pathinfo, '/admin/modifier-professeur') && preg_match('#^/admin/modifier\\-professeur/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_modifier_professeur')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ProfesseurController::modifierAction',));
            }

            // intranet_admin_liste_professeur
            if ($pathinfo === '/admin/lister-professeur') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ProfesseurController::listAction',  '_route' => 'intranet_admin_liste_professeur',);
            }

            // intranet_admin_ajout_classe
            if ($pathinfo === '/admin/ajout-classe') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ClasseController::ajoutAction',  '_route' => 'intranet_admin_ajout_classe',);
            }

            // intranet_admin_voir_classe
            if (0 === strpos($pathinfo, '/admin/voir-classe') && preg_match('#^/admin/voir\\-classe/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_voir_classe')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ClasseController::voirAction',));
            }

            // intranet_admin_liste_classe
            if ($pathinfo === '/admin/lister-classe') {
                return array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ClasseController::listAction',  '_route' => 'intranet_admin_liste_classe',);
            }

            // intranet_admin_modifier_classe
            if (0 === strpos($pathinfo, '/admin/modifier-classe') && preg_match('#^/admin/modifier\\-classe/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_modifier_classe')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ClasseController::modifierAction',));
            }

            if (0 === strpos($pathinfo, '/admin/ajouter-emploi-de-temps')) {
                // intranet_admin_modifier_planning
                if (preg_match('#^/admin/ajouter\\-emploi\\-de\\-temps/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_modifier_planning')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ClasseController::planningAction',));
                }

                // intranet_admin_planning_content
                if (0 === strpos($pathinfo, '/admin/ajouter-emploi-de-temps-contenu') && preg_match('#^/admin/ajouter\\-emploi\\-de\\-temps\\-contenu/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'intranet_admin_planning_content')), array (  '_controller' => 'Intranet\\AdminBundle\\Controller\\ClasseController::contenuAction',));
                }

            }

        }

        // accueil_intranet
        if ($pathinfo === '/intranet') {
            return array (  '_controller' => 'OC\\UserBundle\\Controller\\InfoController::redirectAction',  '_route' => 'accueil_intranet',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
