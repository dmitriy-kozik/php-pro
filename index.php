<?php

class CustomException extends Exception
{
}

class User
{
    public $id;
    public $password;


    public function __construct($id, $password)
    {
        $this->setId($id);
        $this->setPassword($password);
    }

    private function setId($id): void
    {
        if (!is_int($id)) {
            throw new CustomException("User ID isn't Integer");
        }
        $this->id = $id;
    }

    private function setPassword($password): void
    {
        if (strlen($password) > 8) {
            throw new CustomException("The password must be no more than 8 characters");
        }
        $this->password = $password;
    }

    public function getUserData(): object
    {
        return $this;
    }

}


try {
    $user = new User(12, '123456789'); // Password Exception
    echo $user->getUserData()->id;

} catch (CustomException $e) {
    echo $e->getMessage() . ' (line: ' . $e->getLine() . ', file: ' . $e->getFile() . ')';
} catch (Exception $e) {
    echo $e->getMessage();
}


