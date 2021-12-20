<?php
    function validar_campos($array_campos, $podem_vazios) {
        $validar_campos = 0;

        foreach ($array_campos as $indice => $campo) {
            $valor = 0;

            if ($campo == "") {
                $valor = 1;

                foreach ($podem_vazios as $ind_vazio => $vazio) {
                    if ($indice == $vazio) {
                        $valor = 0;
                    }
                }

                if ($valor != 0) {
                    $validar_campos++;
                }
            }
        }

        return ($validar_campos == 0) ? true : false;
    }
?>