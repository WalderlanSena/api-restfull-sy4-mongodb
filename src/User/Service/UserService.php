<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 30/07/18
 * Time: 22:59
 */

namespace App\User\Service;

use App\User\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager;

class UserService
{
    private $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    /**
     * @throws \Exception
     */
    public function findAll()
    {
        try {
            $response = $this->documentManager->getRepository(User::class)->findAll();
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        return $response;
    }

    /**
     * @param $data
     * @return bool
     * @throws \Exception
     */
    public function insert($data)
    {
        try {
            $this->documentManager->getRepository(User::class)->insert($data);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        return true;
    }
}