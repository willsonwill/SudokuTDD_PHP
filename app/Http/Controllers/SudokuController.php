<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SudokuController extends Controller
{
    public function validarSudoku(Request $request)
    {
        if (self::esValido($request->sudo, self::cuadrado($request->orden), $request->orden))
        {
            return true;
        }
        else
        {
            return false;
        }
        //dd($request);
    }
    
    static function cuadrado($n) {
        return $n*$n;
    }

    static function esValido($sudoku, $n, $orden) {
        
        //comprobar si los numeros estan en el rango del orden 3 [1, 9]
        //comprobar si los numeros estan en el rango del orden 2 [1, 4]
        if (self::esRango($sudoku, $n) == false)
        {
            return false;
        }

        //comprobar si hay valores repetidos en las filas
        for($i = 0 ; $i <$n ; $i++){   
            $arrayfilas = array();       
            for($j = 0 ; $j <$n ; $j++){
                $arrayfilas[] = $sudoku[$i][$j];
            }
            //dd($arrayfilas,count(array_unique($arrayfilas))); 
            if(count(array_unique($arrayfilas)) !=$n){
                return false;
            } 
        }

        //comprobar si hay valores repetidos en las columnas
        for($j = 0 ; $j <$n ; $j++){
            $arraycolumnas = array();
            for($i = 0 ; $i <$n ; $i++){
                $arraycolumnas[] = $sudoku[$j][$i];
            }
            //dd($arraycolumnas,count(array_unique($arraycolumnas))); 
            if(count(array_unique($arraycolumnas)) !=$n){
                return false;
            }  
        }
        
        //comprobar si hay valores repetidos en el cuadrado
        for ($i = 0; $i < $n; $i += $orden) {
            for ($j = 0; $j < $n; $j += $orden) {
                $arraycuadrado = array();
                for($k = 0; $k < $orden; $k++)
                {
                    for($l = 0; $l < $orden; $l++)
                    {
                        // almacenaremos el numero fila del cuadrado
                        $X = $i + $k;
                        // almacenaremos el numero columna del cuadrado
                        $Y = $j + $l;
                        // almacena el valor de la matriz sudi[X][Y]
                        $arraycuadrado[] = $sudoku[$X][$Y];
                    }
                }
                //dd($arraycuadrado,count(array_unique($arraycuadrado))); 
                if(count(array_unique($arraycuadrado)) !=$n){
                    return false;
                }  
            }
        }
        // si se valida para todas las filas, columnas y el cuadrado, entonces el Sudoku es válido
        return true;
    }

    static function esRango($sudoku, $n) {
        for($i = 0 ; $i <$n ; $i++){
            for($j = 0 ; $j <$n ; $j++){
                if($sudoku[$i][$j] <= 0 || $sudoku[$i][$j] > $n){
                    return false;
                }
            } 
        }
        return true;
    }
}
