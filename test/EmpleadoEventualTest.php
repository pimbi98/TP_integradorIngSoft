<?php
	require_once 'EmpleadoTest.php';
	
    class EmpleadoEventualTest extends EmpleadoTest
	{
        //Funcion Crear
		public function crearDefault($nombre='Alejandro', $apellido ='Scozzatti', $dni=77777777, $salario = 12000,
								$montos=array[2000,2500,3000,3500])
					{

							$empev = new \App\EmpleadoEventual($nombre,$apellido, $dni, $salario, $montos);
							return $empev;
		            }

        //Probar que el método calcularComision() funciona como se espera.

		public function testCalcularComision(){

		//(2000+2500+3000+3500)/4)*0,1 = 275

			$empev= $this->crearDefault();			 
			$this-> assertEquals(275,$empev->calcularComision()); 
		}

        //Probar que el método calcularIngresoTotal() funciona como se espera.

		public function testCalculoDelIngresoTotal(){

			$empev=$this->crearDefault();
			$this->assertEquals(12275,$empev->calcularIngresoTotal());
		}

        //Probar que si intento construir un empleado
		//proporcionando algún monto de venta negativo o cero, lanza una excepción.

		public function testNoSePuedeConstruirConMontoDeVentaNegativoOCero(){

			$this->expectException(\Exception::class); 
			$ventas = [0,-100, 2500, 3000];
			$empev = $this->crearDefault("Alejandro","Scozzatti",77777777,$ventas);
		}
		
	}
?>