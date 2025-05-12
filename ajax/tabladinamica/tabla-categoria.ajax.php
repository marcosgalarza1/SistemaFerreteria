
<?php
require_once "../../controladores/categorias.controlador.php";
require_once "../../modelos/categorias.modelo.php";


class TablaCategorias
{
    /*=============================================
	MOSTRAR LA TABLA DE Categoria
	=============================================*/
    public function mostrarTablaCategoria()
    {

        $item = null;
        $valor = null;

        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        $datosJson = '{
            "data": [';

            for ($i = 0; $i < count($categorias); $i++) {
      
            /*=============================================
			TRAEMOS LAS ACCIONES
			=============================================*/
			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

				$botones =  ""; 

			}else{

				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='".$categorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='".$categorias[$i]["id"]."'><i class='fa fa-times'></i></button></div>"; 
                 

			}


            $datosJson .= '[
                "' . ($i + 1) . '",
                "' . $categorias[$i]["categoria"] . '",
                "' . $categorias[$i]["fecha"] . '",
                "' . $botones . '"
                
                ],';
                }
    
    
                $datosJson = substr($datosJson, 0, -1);
    
                $datosJson .= ']
            }';
                echo $datosJson;
    }        
}
    /*=============================================
        ACTIVAR TABLA DE CATEGORIA
    =============================================*/
    
    $activarCategorias = new TablaCategorias();
    $activarCategorias->mostrarTablaCategoria();









        