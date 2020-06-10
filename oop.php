
<?php

  class Person{
    private $name;
    private $email;
    private static $ageLimit = 99;

    public function __construct($name, $email) {
      $this->name = $name;
      $this->email = $email;
      echo __CLASS__.' created<br>';
    }

    public function __destruct() {
      echo __CLASS__.' destroyed<br>';
    }

    public function setName($name) {
      $this->name = $name;
    }

    public function getName() {
      return $this->name.'<br>';
    }

    public function setEmail($email) {
      $this->email = $email;
    }

    public function getEmail() {
      return $this->email.'<br>';
    }

    public static function getAgeLimit() {
      return self::$ageLimit.'<br>';
    }
  }

  class Customer extends Person {
    private $balance;

    public function __construct($name, $email, $balance) {
      parent::__construct($name, $email, $balance);
      $this->balance = $balance;
      echo 'A new '.__CLASS__.' has been created.<br>';
    }

    public function setBalance($balance) {
      $this->balance = $balance;
    }

    public function getBalance() {
      return $this->balance.'<br>';
    }
  }

  $customer1 = new Customer('John Doe', 'a@a.com', 300);
  echo $customer1->getBalance();
  echo Person::getAgeLimit();

?>
