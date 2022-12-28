<?php

class Singleton
{
    public string $name = "Aleksandr";
    public static int $age = 20;

    private static ?Singleton $instance = null;

    function getName()
    {
        echo "$this->name<br>";
    }

    function setAge(int $age): void
    {
        self::$age = $age;
    }

    function getAge(): void
    {
        echo self::$age . "<br>";
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance(): Singleton
    {
        if (is_null(self::$instance)) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }
}

$signup = Singleton::getInstance();
$signup->name = "efewfew";
$signup->getName();
$signup->getAge();
$signup->setAge(50);
$signup->getAge();

echo "<br>====<br>";

$signup2 = Singleton::getInstance();
$signup2->getName();
$signup2->getAge();
