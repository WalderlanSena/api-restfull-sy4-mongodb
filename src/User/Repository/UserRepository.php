<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 30/07/18
 * Time: 22:50
 */

namespace App\User\Repository;

use App\User\Document\User;
use Doctrine\ODM\MongoDB\DocumentRepository;

class UserRepository extends DocumentRepository
{
    /**
     * @param $data
     * @return User
     * @throws \Exception
     */
    public function insert($data)
    {
        $doctrine = $this->getDocumentManager();

        $user = new User();
        $user->setName($data->name);

        try {
            $doctrine->persist($user);
            $doctrine->flush();
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        return $user;
    }
}