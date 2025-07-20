<?php
function limpiarAcentos($texto) {
    return str_replace(
        ['á','é','í','ó','ú','Á','É','Í','Ó','Ú'],
        ['a','e','i','o','u','A','E','I','O','U'],
        $texto
    );
}
// Escribir una de las 4 opciones: "perro", "lobo", "gato", "leon"
$animal = "perro"; 
$clave = limpiarAcentos(strtolower($animal));

try {
	class Animal {
		protected string $sonido;
		protected array $alimentos;
		protected string $habitat;
		protected string $nombreCientifico;

		public function getSonido() { return $this->sonido; }
		public function getAlimentos(): array { return $this->alimentos; }
		public function getHabitat() { return $this->habitat; }
		public function getNombreCientifico() { return $this->nombreCientifico; }
	}

	// Subclases
	class Canido extends Animal {}
	class Felino extends Animal {}

	// Clases concretas
	class Perro extends Canido {
		public function __construct() {
			$this->sonido = "¡Guau!";
			$this->alimentos = ["Croquetas", "Carne cocida", "Huesos"];
			$this->habitat = "Casa";
			$this->nombreCientifico = "Canis lupus familiaris";
		}
	}

	class Lobo extends Canido {
		public function __construct() {
			$this->sonido = "Auuuuuuu!";
			$this->alimentos = ["Carne cruda", "Conejos", "Ciervos"];
			$this->habitat = "Bosque";
			$this->nombreCientifico = "Canis lupus";
		}
	}

	class Gato extends Felino {
		public function __construct() {
			$this->sonido = "Miau";
			$this->alimentos = ["Pescado", "Pollo cocido", "Atún"];
			$this->habitat = "Casa";
			$this->nombreCientifico = "Felis catus";
		}
	}

	class Leon extends Felino {
		public function __construct() {
			$this->sonido = "¡Rooaarr!";
			$this->alimentos = ["Carne", "Antílopes", "Zebras"];
			$this->habitat = "Sabana";
			$this->nombreCientifico = "Panthera leo";
		}
	}
	
	switch ($clave) {
		case "perro":
			$animal = new Perro();
			break;
		case "lobo":
			$animal = new Lobo();
			break;
		case "gato":
			$animal = new Gato();
			break;
		case "leon":
			$animal = new Leon();
			break;
		default:
			throw new Exception("Animal no reconocido");
		}

	// Muestra datos
	echo "<h2>Animal: " . ucfirst($clave) . "</h2>";
	echo "<strong>Nombre científico: </strong>" . $animal->getNombreCientifico() . "<br>";
	echo "<strong>Sonido: </strong>" . $animal->getSonido() . "<br>";
	echo "<strong>Alimentos: </strong>" . implode(", ", $animal->getAlimentos()) . "<br>";
	echo "<strong>Hábitat: </strong>" . $animal->getHabitat() . "<br>";

} catch (Exception $e) {
    echo "<h3>Error: " . $e->getMessage() . "</h3>";
}
?>