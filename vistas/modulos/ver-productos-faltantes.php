<div class="content-wrapper">

  <section class="content">

    <div class="box">

  

      <div class="box-body">
       
        <div class="card card-secondary card-outline">
          <div class="card-body">
            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id"]; ?>">

            <div class= "col-xs-12 col-sm-12 col-md-12">
                  <div class="panel mb-2">
                      <div class="embed-responsive embed-responsive-4by3" style="margin-top: 10px;">
                          <iframe class="embed-responsive-item" src="<?php echo 'extensiones/tcpdf/pdf/genera-producto-faltante.php?idUsuario='.$_SESSION["id"]; ?>"></iframe>
                      </div>
                  </div>
              </div>
       

          </div><!--/body card-->
        </div><!--/CARD FIN-->

      </div>

    </div>

  </section>

</div>
