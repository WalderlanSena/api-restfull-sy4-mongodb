<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 30/07/18
 * Time: 20:32
 */

namespace App\User\Controller;

use App\User\Service\UserService;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends FOSRestController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAction()
    {
        try {
            $response = $this->userService->findAll();
        } catch (\Exception $exception) {
            return new JsonResponse([
               'status'  => false,
               'message' => 'Erro ao buscar usuários',
               'data'    => null,
               'errors'  => $exception->getMessage()
            ]);
        }

        return new JsonResponse([
            'status'  => true,
            'message' => 'Usuários encontrados',
            'data'    => $response,
        ]);
    }

    public function postAction(Request $request)
    {
        $request = json_decode($request->getContent());

        try {
            $response = $this->userService->insert($request);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'status' => false,
                'message' => 'Erro ao cadastrar um novo usuário',
                'data'   => null,
                'errors' => $exception->getMessage()
            ]);
        }

        return new JsonResponse([
            'status'  => true,
            'message' => 'Usuario cadastrado com sucesso !',
            'data'    => $response,
        ]);

    }
}