<?php
interface Actor {
    public function actuar(): string;
}

interface ObjetoInerte {
    public function ubicacion(): string;
}

abstract class Persona implements Actor {
    protected string $nombre;
    protected int $edad;
    protected string $genero; // "masculino" o "femenino"

    public function __construct(string $nombre, int $edad, string $genero) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->genero = strtolower($genero);
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEdad(): int {
        return $this->edad;
    }

    public function getGenero(): string {
        return $this->genero;
    }

    public function saludar(): string {
        return "Hola, soy {$this->nombre}.";
    }

    // Este método se sobrescribe en las subclases
    public function actuar(): string {
        return "{$this->nombre} es una persona.";
    }
}

// subclase de Persona
class Profesor extends Persona {
    private string $materia;
    private int $experiencia;

    public function __construct(string $nombre, int $edad, string $materia, int $experiencia, string $genero) {
        parent::__construct($nombre, $edad, $genero);
        $this->materia = $materia;
        $this->experiencia = $experiencia;
    }

    public function enseñar(): string {
        return "{$this->nombre} enseña {$this->materia} con {$this->experiencia} años de experiencia.";
    }

    public function evaluar(): string {
        return "{$this->nombre} está evaluando a sus estudiantes.";
    }

    public function actuar(): string {
        $rol = $this->genero === "femenino" ? "profesora" : "profesor";
        return "{$this->nombre} desempeña su rol como {$rol}.";
    }
}

// subclase de Persona
class Estudiante extends Persona {
    private string $curso;
    private float $promedio;

    public function __construct(string $nombre, int $edad, string $curso, float $promedio, string $genero) {
        parent::__construct($nombre, $edad, $genero);
        $this->curso = $curso;
        $this->promedio = $promedio;
    }

    public function estudiar(): string {
        return "{$this->nombre} está estudiando en el curso {$this->curso}.";
    }

    public function verPromedio(): string {
        return "Promedio actual: {$this->promedio}";
    }

    public function actuar(): string {
        return "{$this->nombre} está en su rol como estudiante.";
    }
}

// implementa ObjetoInerte
class Vehiculo implements ObjetoInerte {
    protected string $marca;
    protected string $modelo;
    protected int $ruedas;
    protected int $año;

    public function __construct(string $marca, string $modelo, int $ruedas, int $año) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ruedas = $ruedas;
        $this->año = $año;
    }

    public function moverse(): string {
        return "El vehículo {$this->marca} {$this->modelo} del año {$this->año} se está moviendo.";
    }

    public function ubicacion(): string {
        return "Ubicado en el estacionamiento.";
    }

    public function fichaTecnica(): string {
        return "Marca: {$this->marca}, Modelo: {$this->modelo}, Ruedas: {$this->ruedas}, Año: {$this->año}";
    }
}

// subclase de Vehiculo
class Coche extends Vehiculo {
	private const RUEDAS_COCHE = 4;
    private bool $aireAcondicionado;
    private string $combustible;
    private int $puertas;

    public function __construct(string $marca, string $modelo, int $año, bool $aireAcondicionado, string $combustible, int $puertas) {
        parent::__construct($marca, $modelo, self::RUEDAS_COCHE, $año);
        $this->aireAcondicionado = $aireAcondicionado;
        $this->combustible = $combustible;
        $this->puertas = $puertas;
    }

    public function encenderMotor(): string {
        return "El coche {$this->marca} ha encendido su motor.";
    }

    public function tieneAire(): string {
        return $this->aireAcondicionado ? "Sí" : "No";
    }

    public function consumoEstimado(): string {
        return "Este coche consume aproximadamente 7 litros por 100 km.";
    }
}

// subclase de Vehiculo
class Bicicleta extends Vehiculo {
	private const RUEDAS_BICICLETA = 2;
    private string $color;
    private float $peso;
    private string $tipoFreno;

    public function __construct(string $marca, string $modelo, int $año, string $color, float $peso, string $tipoFreno) {
        parent::__construct($marca, $modelo, self::RUEDAS_BICICLETA, $año);
        $this->color = $color;
        $this->peso = $peso;
        $this->tipoFreno = $tipoFreno;
    }

    public function pedalear(): string {
        return "Pedaleando la bicicleta {$this->marca} {$this->modelo} de color {$this->color}.";
    }

    public function detallesTecnicos(): string {
        return "Color: {$this->color}, Peso: {$this->peso} kg, Frenos: {$this->tipoFreno}.";
    }

    public function frenar(): string {
        return "Frenando con frenos {$this->tipoFreno}.";
    }
}
//Ingresar datos
$nombreProfesor = "Juan Perez";
$edadProfesor = 39;
$materiaProfesor = "Programación";
$experienciaProfesor = 5;
$generoProfesor = "masculino";

$nombreEstudiante = "Carla Andrade";
$edadEstudiante = 20;
$cursoEstudiante = "OOP";
$promedioEstudiante = 89.3;
$generoEstudiante = "femenino";

$marcaCoche = "Toyota";
$modeloCoche = "Corolla";
$añoCoche = 2022;
$aireCoche = true;
$combustibleCoche = "Gasolina";
$puertasCoche = 5;

$marcaBici = "Trek";
$modeloBici = "FX 3";
$añoBici = 2023;
$colorBici = "Rojo";
$pesoBici = 10.5;
$tipoFrenoBici = "Disco hidráulico";

echo "<h2>Profesor</h2>";
$prof = new Profesor($nombreProfesor, $edadProfesor, $materiaProfesor, $experienciaProfesor, $generoProfesor);
echo $prof->saludar() . "<br>";
echo $prof->actuar() . "<br>";
echo $prof->enseñar() . "<br>";
echo $prof->evaluar() . "<br>";

echo "<h2>Estudiante</h2>";
$est = new Estudiante($nombreEstudiante, $edadEstudiante, $cursoEstudiante, $promedioEstudiante, $generoEstudiante);
echo $est->saludar() . "<br>";
echo $est->actuar() . "<br>";
echo $est->estudiar() . "<br>";
echo $est->verPromedio() . "<br>";


echo "<h2>Coche</h2>";
$coche = new Coche($marcaCoche, $modeloCoche, $añoCoche, $aireCoche, $combustibleCoche, $puertasCoche);
echo $coche->moverse() . "<br>";
echo $coche->ubicacion() . "<br>";
echo $coche->encenderMotor() . "<br>";
echo "¿Aire acondicionado? " . $coche->tieneAire() . "<br>";
echo $coche->consumoEstimado() . "<br>";

echo "<h2>Bicicleta</h2>";
$bici = new Bicicleta($marcaBici, $modeloBici, $añoBici, $colorBici, $pesoBici, $tipoFrenoBici);
echo $bici->moverse() . "<br>";
echo $bici->ubicacion() . "<br>";
echo $bici->pedalear() . "<br>";
echo $bici->detallesTecnicos() . "<br>";
echo $bici->frenar() . "<br>";
?>