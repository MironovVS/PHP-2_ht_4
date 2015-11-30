<?php

abstract class Animal
{
	public $age = 0;

	abstract function get_voice();

	protected function eat()
	{
		$this->age++;
	}
}

// Класс кота
class Cat extends Animal
{
	public function get_voice() {
		return 'Myau';
	}
}


class Dog extends Animal
{
	public function get_voice() {
		return 'Gav';
	}
}


$dog = new Dog;
echo $dog->get_voice();

$cat = new Cat;
echo $cat->get_voice();