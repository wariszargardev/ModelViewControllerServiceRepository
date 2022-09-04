<?php
declare(strict_types=1);

namespace App\Modules\Sanctum;

class SanctumAuthorizeRequest
{
    private $name;
    private $email;
    private $password;
    private $device;

    public function __construct(string $name, string $email, string $password, string $device)
    {
        $this->name= $name;
        $this->email= $email;
        $this->password= $password;
        $this->device= $device;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getDevice(): string
    {
        return $this->device;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}
