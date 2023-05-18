<?php 

	class Animal {
		public $nama;
		public $jenis;

		function getinfo()
		{
			return "Hewan ini adalah $this->nama dan jenisnya $this->jenis. ";
		}
	}

	class Cat extends Animal {
		function __construct($nama)
		{
			$this->nama = $nama;
		}

		function getinfo()
		{
			return "Hewan ini adalah $this->nama dan jenisnya $this->jenis = kucing. Kucing adalah hewan yang suka bermain dan bersih.";
		}
	}

	class Dog extends Animal {
		function getinfo()
		{
			return "Hewan ini adalah $this->nama dan jenisnya $this->jenis = anjing. Anjing adalah hewan yang setia dan cerdas.";
		}
	}

	$animal = new Animal();
	$animal->nama = 'Harimau';
	$animal->jenis = 'karnivora';
	echo $animal->getinfo();
	echo "<br>";
	$cat = new Cat('Kitty');
	echo $cat->getinfo();
	echo "<br>";
	$dog = new Dog();
	$dog->nama = 'Buddy';
	echo $dog->getinfo();

?>