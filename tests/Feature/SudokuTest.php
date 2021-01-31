<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SudokuTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //TEST VALIDAR SUDOKU 3X3
    //TEST VALIDAR SUDOKU 3X3 VALIDO
    /** @test */
    public function testValidarSudoku_3x3()
    {
        $orden=3;
        $sudo =  array(
            array(5,6,8,3,2,9,7,4,1),
            array(4,2,1,6,5,7,3,8,9),
            array(7,3,9,1,8,4,5,2,6),
            array(8,7,5,4,3,1,9,6,2),
            array(3,9,4,2,6,8,1,5,7),
            array(2,1,6,7,9,5,4,3,8),
            array(9,5,3,8,7,6,2,1,4),
            array(6,4,7,5,1,2,8,9,3),
            array(1,8,2,9,4,3,6,7,5)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(true);
    }

    //TEST VALIDAR SUDOKU 3X3 SI EL NUMERO NO ESTE EN EL RANGO DE 1 A 9
    /** @test */
    public function testValidarSudoku_3x3NumeroRango1y9()
    {
        $orden=3;
        $sudo =  array(
            array(15,6,8,3,2,9,7,4,1),
            array(4,2,1,6,5,7,3,8,9),
            array(7,3,9,1,8,4,5,2,6),
            array(8,7,5,4,3,1,9,6,2),
            array(3,9,4,2,6,8,1,5,7),
            array(2,1,6,7,9,5,4,3,8),
            array(9,5,3,8,7,6,2,1,4),
            array(6,4,7,5,1,2,8,9,3),
            array(1,8,2,9,4,3,6,7,5)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(false);
    }

    //TEST VALIDAR SUDOKU 3X3 SI HAY REPETIDO EN FILAS
    /** @test */
    public function testValidarSudoku_3x3FilaRepetida()
    {
        $orden=3;
        $sudo =  array(
            array(5,5,8,3,2,9,7,4,1),
            array(4,2,1,6,5,7,3,8,9),
            array(7,3,9,1,8,4,5,2,6),
            array(8,7,5,4,3,1,9,6,2),
            array(3,9,4,2,6,8,1,5,7),
            array(2,1,6,7,9,5,4,3,8),
            array(9,5,3,8,7,6,2,1,4),
            array(6,4,7,5,1,2,8,9,3),
            array(1,8,2,9,4,3,6,7,5)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(false);
    }

    //TEST VALIDAR SUDOKU 3X3 SI HAY REPETIDO EN COLUMNAS
    /** @test */
    public function testValidarSudoku_3x3ColumnaRepetida()
    {
        $orden=3;
        $sudo =  array(
            array(5,6,8,3,2,9,7,4,1),
            array(4,1,2,6,5,7,3,8,9),
            array(7,3,9,1,8,4,5,2,6),
            array(8,7,5,4,3,1,9,6,2),
            array(3,9,4,2,6,8,1,5,7),
            array(2,1,6,7,9,5,4,3,8),
            array(9,5,3,8,7,6,2,1,4),
            array(6,4,7,5,1,2,8,9,3),
            array(1,8,2,9,4,3,6,7,5)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(false);
    }
    //TEST VALIDAR SUDOKU 3X3 SI EN UN CUADRADO SE REPITE UN NUMERO 
    /** @test */
    public function testValidarSudoku_3x3CuadradoNumeroRepetido()
    {
        $orden=3;
        $sudo =  array(
            array(1,2,3,4,5,6,7,8,9),
            array(2,3,4,5,6,7,8,9,1),
            array(3,4,5,6,7,8,9,1,2),
            array(4,5,6,7,8,9,1,2,3),
            array(5,6,7,8,9,1,2,3,4),
            array(6,7,8,9,1,2,3,4,5),
            array(7,8,9,1,2,3,4,5,6),
            array(8,9,1,2,3,4,5,6,7),
            array(9,1,2,3,4,5,6,7,8)        
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(false);
    }


    //TEST VALIDAR SUDOKU 2X2
    //TEST VALIDAR SUDOKU 2X2 VALIDO
    /** @test */
    public function testValidarSudoku_2x2()
    {
        $orden=2;
        $sudo =  array(
            array(1,2,3,4),
            array(3,4,2,1),
            array(2,1,4,3),
            array(4,3,1,2)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(true);
    }

    //TEST VALIDAR SUDOKU 2X2 SI EL NUMERO NO ESTE EN EL RANGO DE 1 A 4
    /** @test */
    public function testValidarSudoku_2x2NumeroRango1y4()
    {
        $orden=2;
        $sudo =  array(
            array(1,2,3,5),
            array(3,4,2,1),
            array(2,1,4,3),
            array(4,3,1,2)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(false);
    }

    //TEST VALIDAR SUDOKU 2X2 SI HAY REPETIDO EN FILAS
    /** @test */
    public function testValidarSudoku_2x2FilaRepetida()
    {
        $orden=2;
        $sudo =  array(
            array(1,1,3,4),
            array(3,4,2,1),
            array(2,1,4,3),
            array(4,3,1,2)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(false);
    }

    //TEST VALIDAR SUDOKU 2X2 SI HAY REPETIDO EN COLUMNAS
    /** @test */
    public function testValidarSudoku_2x2ColumnaRepetida()
    {
        $orden=2;
        $sudo =  array(
            array(2,1,3,4),
            array(3,4,2,1),
            array(2,1,4,3),
            array(4,3,1,2)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(false);
    }
    //TEST VALIDAR SUDOKU 2X2 SI EN UN CUADRADO SE REPITE UN NUMERO 
    /** @test */
    public function testValidarSudoku_2x2CuadradoNumeroRepetido()
    {
        $orden=2;
        $sudo =  array(
            array(1,2,3,4),
            array(2,3,4,1),
            array(3,4,1,2),
            array(4,1,2,3)
        );
        $response=$this->post('validar-sudoku',[
            'orden' => $orden,
            'sudo' => $sudo
        ]);
        $response->assertSee(false);
    }
}
