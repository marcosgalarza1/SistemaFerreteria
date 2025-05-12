<?php
require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";


class TablaClientes
{
    /*=============================================
	MOSTRAR LA TABLA DE CLIENTES
	=============================================*/
    public function mostrarTablaclientes()
    {

        $item = null;
        $valor = null;
        $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

        $datosJson = '{
            "data": [';

            for ($i = 0; $i < count($clientes); $i++) {
      
            /*=============================================
			TRAEMOS LAS ACCIONES
			=============================================*/
			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor"){

				$botones =  ""; 
              
			}else
            
            {

				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCliente' idCliente='".$clientes[$i]["id"]."'><i class='fa fa-times'></i></button></div>"; 
            }
			


            $datosJson .= '[
                "' . ($i + 1) . '",
                "' . $clientes[$i]["nombre"] . '",
                "' . $clientes[$i]["documento"] . '",
                "' . $clientes[$i]["telefono"] . '",
                "' . $clientes[$i]["direccion"] . '",
                "' . $clientes[$i]["compras"] . '",
              
                "' . $clientes[$i]["fecha"] . '",
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
    
    $activarClientes = new TablaClientes();
    $activarClientes->mostrarTablaClientes();


