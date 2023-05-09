<?php

class CustomException extends Exception
{
}

class User
{
    public function __construct(private string $name, private float $age, private string $email)
    {
    }

    public function __call(string $name, array $arguments) {
        throw new CustomException('Method ' . $name . ' is not isset or outside of permissions (arguments: ' . implode(', ', $arguments) . ')');
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }

    private function setAge(string $age)
    {
        $this->age = $age;
    }


    public function getAll(): object
    {
        return (object) [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email
        ];
    }

}


try {
    $user = new User('Sam', 28, 'sam@test.com');
    $user->setName('Dima'); // Success
    $user->setAge(29); // Private method: Exception
    $user->setEmail('dima@test.com'); // Method isn't isset: Exception
    echo $user->getAll()->name;
} catch (CustomException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}


