<?php

/**
 * This file is part of ESO system.
 *
 * (c) ESO 2018
 *
 * If you want, you can see license file at https://github.com/ZPOSO/ESO/LICENSE
 *
 * Date: 27.05.18
 * Time: 12:09
 *
 * @author Mariusz08 < https://github.com/Mariusz08 >
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use App\Config\FrontConfig;

class LoginController extends Controller
{
    public function indexView(AuthorizationCheckerInterface $auth, FrontConfig $config)
    {
        if ($auth->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('');
        }
		$helper = $this->get('security.authentication_utils');
        return $this->render('index.html.twig', [
			'h' => $helper->getLastAuthenticationError(),	
			'pageTitle' => 'Tytul',
			'configProductName' => $config->get('product_name'),
			'configPageLanguage' => $config->get('page_language'),
			'configAuthor' => $config->get('author')
		]);
    }
    public function checkView()
    {

    }
    public function logoutView()
    {

    }
}
