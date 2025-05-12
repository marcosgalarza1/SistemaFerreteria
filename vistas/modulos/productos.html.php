<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
      <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarProducto">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB0AAAAdCAYAAABWk2cPAAAACXBIWXMAAAsTAAALEwEAmpwYAAACJElEQVR4nO3WS4iOURgH8J9bFoiGhWtJMS7JQm6FJpJLZoHY2MxYsGBhM41bbNgoC4py2U2TyexYUETU5JImG7EwCylMclm404zO9Hx6fc33zTfzygL/evrOd973/P/P+Z/nOb38x9+KmXiFN/2MQ3lEh+EJTmI+1mBRjNdhQYzXx+9qfMPavLvdipcYgXNYHvMXw4mE2xiHY7iVV3AUGvAJ59FYJvbGey1YnEd0ath1BxcqjK84GOvHY3OZWFlK+CwuVZhkLd6hKv4fxXt09BLP0I25GFlMNCVsW9KH4GA8wIHM3A60lXh/VYh2R6KF+jA77OruZxyJ9cvwtoToblzLFGJKsAdD8RinoyVqY8dpvAELY7wp00bfM2dVFUlM6kX0DI7Hs9TbK7IPt8QFkSr5FJbGfCuqY3wDY3Eik30Bz8PKYrThZnAnrkGFB2OwBx+iMsu1zD58RnMmMZFEsrIYb/EoqvinYKGI0pneq7BdWsPe/ZgXhFdxuahVtoXt27ERw4szSpZeURkSwetwKO34I+6XiQ50YUYx0YSwt6YPwSF4GFaLFkh2zymzpiVuul8KqGsA7TKQ6Ao9u6LCpv2BaAs9O9HZjzs3T3SGXk/TNsQZXUc7nkaFNuaI1uBpD97G0JlYfOCH0RTXVb18qA+epuAtiX9LtBl3UZdTtC54mvsSrYm7Mt0ws3KKVuMFvsSHXFmkT4/JOQULGI3pv4krH34AgQHmpLZlT6YAAAAASUVORK5CYII=">

          Agregar prodcuto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
         
        <thead>
         
          <tr>
           
           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Código</th>
           <th>Descripción</th>
           <th>Categoría</th>
           <th>Cantidad</th>
           <th>Precio</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>

      <tbody>

      <tr>
                <td>1</td>
                <td> <img src="vistas/img/productos/anonymous.png" class="img-thumbnail" width="40px"> </td> 
                <td>001</td>
                <td>coca cola</td>
                <td>soda</td>
                <td>150</td>
                <td>18bs</td>
                <div class="btn-group">
                  <td>

                    <button class="btn btn-warning"> <i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"> <i class="fa fa-times"></i></button>
                  </div>
                </td>



              </tr>
              <tr>
                <td>1</td>
                <td> <img src="vistas/img/productos/anonymous.png" class="img-thumbnail" width="40px"> </td> 
                <td>001</td>
                <td>coca cola</td>
                <td>soda</td>
                <td>150</td>
                <td>18bs</td>
                <div class="btn-group">
                  <td>

                    <button class="btn btn-warning"> <i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"> <i class="fa fa-times"></i></button>
                  </div>
                </td>



              </tr>
              <tr>
                <td>1</td>
                <td> <img src="vistas/img/productos/anonymous.png" class="img-thumbnail" width="40px"> </td> 
                <td>001</td>
                <td>coca cola</td>
                <td>soda</td>
                <td>150</td>
                <td>18bs</td>
                <div class="btn-group">
                  <td>

                    <button class="btn btn-warning"> <i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"> <i class="fa fa-times"></i></button>
                  </div>
                </td>



              </tr>
                 
        </tbody> 

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group row">
              <div class="col-xs-5">

              
                    <div class="input-group">
                    
                      <span class="input-group-addon">
                        
                      <img src="data:image/png;base64,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">
                    
                    </span> 

                      <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="código" readonly required>

                    </div>

             </div>

            <!-- ENTRADA PARA SELECCIONAR LA CATEGORIA -->

    
            <div class="col-xs-7">
                  <div class="input-group">
                  
                    <span class="input-group-addon">
                      
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEQ0lEQVR4nO2by04UQRSGf2BMNA6u1KBAjEqAN9A4LNyrJMLGyxMM4IKAa30FN4rGhbrhomhiFPfiJD4Bgi+g7rwQk3Ec21RyOjmpdE8109Vd1fT5kkrmUl1d8/c5dU5dBhAEQRAEQRAEQSgqwwDmALwD8AnALhX1egPALIAh1530kUEADwG0AASG0gawBuCU6077wiSAnyROE8AKgGsAxgAcpqJeX6fvmlRXXXPFYj8CyyUXbpFFBWRVpxNccwbAC2aNyuVLKeAkCfAXwHwX1y/QtW1Llmjrh+ci4CBz2/kO9RoANg0iqjZ+ADhRJgEfM7flqLGuyt4r8d6z9/1Uh7NObakgVAoBh8n1mtqYNw7gHwWKONbIZbmIZ6mtFlm2zR+ue4DpfVw7VpmjG+hCVVkEjkNF4mWKzLqwqs2ZFP2K+uG6B5jex7VjlQ26gRLDFjepzTdlcOHPdIMRi22OUZvbZRAwjL4qICSNtjp6/X6WXGc5Bpr6EddO5gJuRowlnYiKzlkIaOqXkzFwh24warHNcWpzqwwuLEEkJbMd0phVADcM0XZFS7Z5GlMvQx44RElvkxYGeCRtGxLpVarD3X8kw0TayzxQ8YhuolZVOKNakqw/4WrE2PmS2lpCOgozBipOsmi80KGeKQouUhvfAQyUSUDQElS4nLXQxfWLbDnrkoX+FE7AcF7cphuu08KAiRHmtm0KSqVcUA25TOt5AQWDNYrE4zTmVem1isDPAfxhbmvD8govoOIogHsJN5VatPaXdgF1XzJIudxbmlX8orJFKy31lKmKIAiCIAiCIAhC8eilUhh6qPiAEu4plcKIOA1gynUnSLAnbEFDHS+pwHMqdNJAbYMe8MDyAra4ERTBEmfYE0+z22bL8tRh94sALrDtCG8tsQrgCxPwG4AjHogX4r2Id6lzDSoBfebKbSci6kz46s7H2dOtAThHBy93c1qF7mR5Ol5a4gPqkNo4Cgk3kdR3Li0v6iSCV5Y4RnseLe0YL/9cbTC5ctu4fWpvRHxFnbif0DJduK237lxjTz/qlMEAe8qqrku3jfvcqSU2IqKt3kkenXscu61X7nyVbvjV8D+RKtUJLEzxkojXLbmKWKEpW9IZR53qbqeY4nXrtnE4dec6E6SSgeBR9AF41kHAtGe2cxMwziUbhpOgUzEub1PEkEMAju2x7dysjwcF7PEkqI0pXhIR1TGT3xEixrl5buKlTUtqhrTHloi3AbwGcNAXtw1ZYucCu8XWFM9GIl3TEmn1YHKfsjX2eCre5hSvL0Fa49xtTZaz2cWpeJtTPJOIzt1WcZ6Wp9KOXVHLXzaS4b24c65uG/KBbngng2j+0eIUzySiE/Gm2RI9/7OhzS0AW7t4nUR0Il6FjuoGGZcdi7t4USI6EY9P2fIodYv91gOLFwunRaM3YmM9N8vbbyIui3glOlwkCIIgCIKAbPkP8J2W5oeC6KwAAAAASUVORK5CYII=">
                  
                  </span> 

                    <select class="form-control input-lg" name="nuevaCategoria">
                      
                      <option value="">Categoria</option>

                      <option value="comida">comida</option>

                      <option value="bebidas">bebidas</option>

                      <option value="horneados">horneados</option>

                    </select>

                      </div>
                </div>
            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon">
                  
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEwUlEQVR4nO2S2VNTVxzHfxctdarYsRaHpQRJAgkhBAxgxGXUUWvV1ulT22kf+lAf+tJ/oJtdHLU62mJrkVYNFQTMCgkioDEqW1VUaOtgB7BCvSExQCABETX5ds7NUJClZMa8tNPfzGfOPefc+/2c5RL9X/+WStT+EZNYzP+eVMJ3JpXxneIyR6fkVBD2zMbYnKj4bk1YxUuL7m4XlzogOdWDZL0TKUaGK4jBCaneKcwlneQDYl3n8+ETn3R8KkgNTshMLsjL7yG1Igh7ZmNsQYK8lF8TNnFSGW9kwUzAZGlWN5SVbqRVuqGwupHK5EYXpLoeSEr4D8ImZvfIjpftjknTq3qhqu6D6kwflKd7obC4ITe7hBMRlzmOhkUq+6o+SqVt788s6vBklXZ4NLrbntzyLs8aS7dndUW3J9fU5Vmuu+3JKunwsHeUx29dDIu4SJSuNifn4GzaKvycuR4t2S/jlmYr2nNfRfuKbWhbvgXXszahMWMdahQrYZRmD4RFXJiQvt0ozRZC6zPW4Zp6I37N2Yw2zVa0abbgl5zNuKregEuqtTiTmgu9JAtHF8uinlr8Q5zyjTKxGlbZCpxXrkFT5no0qzfiRtYmgWb1BjRmrse5tNWwpGhQkrQMx2Kk0U8tPhSbIv8pUQWDNBtV8lxBXp+xVlgAo061Fra01aiUrxB2qxUpeRBxFI7Kj5efK1qaIcitMg2qU1eiVrFKgB2vRaaBXpINtsDvY2UfTgnoraKF921k8LdQQSighV5j3+2PWZp4JF7eXZioQqlYLSzAlJwjoJdmC8erFaXjcJysdqdCETlFPGiidwf05A+0EsZ4fI3QZ50Lf8v42Bj+VnKjjYQf5eCLothDMTJTwUuKwHFROtgiCkUqHEtQoiA+dTgvJnlPnlT67LRH5jWRdqCUMFI7Hu4yPAOfLQIj9RFTxAy00scTM/ZFSyUHl0jff2fjjjs7Vr154cAS6du74+SL//GuvGZqZuL+ExwC1wmBFsKjK5zQBm4E+5Pxt9AAfqMXJmct+OK8ff6X9s9C+EWIiX1M3Kfl4DMT/Ndm5tFlwmD1HPibibF3clbUrgv2qFDEsNM8r5kwJnYf4TDaEBRMR/s389B9LBJ95XPw8DLdRyPFT8xbtK/Bvmh/w+xiXw0tmSi+l8+h/wThYcP0OE/OFdrRumB/tJ6+m5gXnXfFHp13dXbxsJXiJ4t7vuYwYiOMXhpn5DwntA8uBBkbf3CRHo7UkXgsL/ZIqz02v3V2cW8VLZwiPsjBnc9kQdy6OejKj0SfMeLvsSewUeFYXsLxm/YE7c0Q7hjEDZrp8WQxv4fDUCXhfi3BZ+WEdrg62J/McC09fnCOFCxPUtxeJy7u2EWhlNdEt6aId3NwHuAwXEXT0n04Et7y8fmhKjLIdLdlKYY7QzJD13WFzrVgVvGgmXTTif/8nMOgnjBknYqvguAtn9C3UOAta4UvzeoAQ2F1tKVa+NdpJyJm3rGZ3ptJ7NjHwWuikDhjeQWZNb1PkFHjvrms1h03rZi30HOeU9TRf4Lje3/keOchjnfs5/i7uzne9S2dHdTR3pnoMMYVVJq3NZ0u39Z0oPIjs9rWv3ciWbb+T1Q1PfNDuvP/bP0F5/AUwxXlPvUAAAAASUVORK5CYII=">
              
              </span> 

                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="descripción" required>

              </div>

            </div>

             

             <!-- ENTRADA PARA La cantidad -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC1klEQVR4nNWWWYiOURjHf59ljMZYs9egbEVDXMgySJOxRQkXsoaUUJYbTEyWrKFsuVCT3GKaBjdoyL5eTGTPDZMYZGJGzUTP9D/TcXq/bzDvJP86dd5zzvP8z/usB/4zpAMDNWze5BgCnAWqgB8aNj8DZDcV6VLgO3ASGANkaOQAp4BqYEncpNNEOivFmTk6MyUu0lbAa2BDsD4T2BesbQJeAWlxEE8FPgVBtBa4ALwLzrYGPgOT4yDeBhQHa1lAjwhiQwmwNQ7iQ0BhxHoy4kLJNBr5wMU/IL4MbIyDeLRSpfNvEHdRZI+MgzgB3AZOBOvNgPYRZr4lmViQDVQCO4HmEfstgN3AF2AwMWMU8BZ4BKwBxmlYaj3WXiwmjkJbBc5dWaBScysumTQCLYFlQCnwUQ3gKXBAudsQ7MxByVRJR6l0mjsi0Qt4KJNtAXIV0YuBS8A3YH4K0gUis9RbJNlc6SoHHojjF3QEXqjltUmieJ7SanaSBmF7c736bv4eoWDMBIqA5+KqxzGlgSvulibr5Ltu3rkVwIcgjToAFcBy7/uJGst74I5qeJrmR/yAsduO95SdAwo07ge5a0pXemurFdW251poiXyapcfCRO1NEFddIE7SjZ2gYaxMNAB4Fph1D3Da+zb37CIa64GvQB/v4hZwefaxECiLEGoH3NPFfKwCrnvfNwILOGxWUIW5XSZOZgBvgk0zxTV3IECBTOlwXpEb4qaeSyHKgek26Q7UBqXOlL0EjmtkBH+YH/yZXTJEf1ktLL21QFe3UBz4zeWgG1ZY0HuqOsjH3lqr85uQ0EvkcEBcpFGPfnrebE/RWYYrlaJ6bb5SZ5i3Zi/Rnt5FdoijbyicI8VX5INOemcN1aPOqtL+JBdLqKzamb2SSZcO03VVF7PLRML8fVTp5R7sNaq3LhdTIU9nazz5ChUN090gLPnNd4P+suuYjMmajqTN4Z/gJ+ripVAsT6eSAAAAAElFTkSuQmCC"></span> 

                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="cantidad" required>

              </div>

            </div>

            

                <!-- ENTRADA PARA  VENTA -->

                <div class="form-group">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACmElEQVR4nO2UXUiTYRiGb92yf8TAsliWWhhSSY4IPKgokkER0lo/lgMZHkQLakvbQp3ZdtDPlEFGB0FCSY1wRHkgSIbOsyiQosKok5Flg7mUrHTtifeb37av7R2zuY684YJtPM998e57N2A+8/kvscOM65hIC3aY+WIz2mEHMWRtmbRzYHNKsA6xD6ybmwb0ioObXAqykZZL/biaLk2fSDhT7FJExA3o5YsvYogN7X+xnSy/qriFyp4NQtmS9oWk/3qAO2eZqhK6BDHr5saEj2xIXKz7FnuqWo8qcgo7qPB+XoyQ7dSNq8PvhVnWneAZe0XxOV8lZbRmUGl3gaR0n3ubRJzlkMeItz5ZL+yyjrDYDG+iE/tEsWlMQ+s6VpLqmVJSqhpUSsRLbyyKEav6lMKu2a+JPrEvKbE1qCXzlyPU/F36rM9+qiR5mywsLusqihGzHbbLOmYlzr2aTbr3FXEvjPV3NR3qL6f8O7lU6iwk02joVPHQDVcIXUmLGTmty7iFLVMnyfRZQ43+Ywl/Tqwj/FhMSYpxDbTYkpUSrCM5sR4juABKC3qM8MWn8Q4G0FywxgA6bgyxmn3Gurkx4Dkug1LlaBNoog5EM7DXOgM+8MVadKIWlAoletBkE4jqI2LGpBEBMmAt73LdjP5zmA05DpDzMSjoBtEgiJ6CyC6V+8/gVHxxNsqwAjX/wtsHeCkIowgOgMgaEb+uQSPvy84EsGC2DN2F4m+pyM+OkDRgxPSV3diLuYznEXbwxGP3QIHzCDw8iNsAls+pWLMLeVP9+BFP7LZhuLoERgAbkYbInC24RW4Eo6XebowW5EEt3J40pqi5BrY3nRj0uPCqz4Gu4nwcBiBPp1TMKgDlAPYA2DJz+eYDlj9OlIO2zGQBggAAAABJRU5ErkJggg==">
                    
                    
                    </span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio" required>

                  </div>
                
                

                 

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-warning">Guardar</button>

        </div>

      </form>

        <?php

          /* $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto(); */

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg"  name="editarCategoria" readonly required>
                  
                  <option id="editarCategoria"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

              </div>

            </div>

             <!-- ENTRADA PARA CANTIDAD -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

              </div>

            </div>

            

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>

                  </div>
                
                 

                

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="editarImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

        <?php

          /* $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto(); */

        ?>      

    </div>

  </div>

</div>

<?php

 /*  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto(); */

?>      



