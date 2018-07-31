<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 30/07/18
 * Time: 22:42
 */

namespace App\User\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class User
 * @package App\User\Document
 * @MongoDB\Document(repositoryClass="\App\User\Repository\UserRepository", collection="user")
 */
class User
{
    /**
     * @MongoDB\Id
     */
    public $id;

    /**
     * @var string
     * @MongoDB\Field(type="string")
     */
    public $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }
}