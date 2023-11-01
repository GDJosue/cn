<div id="main">
    <article class="post">
        <h2 align="center">Configuracion de la cuenta</h2>
        <form action ="<?=base_url?>usuario/modificar" method="POST" enctype="multipart/form-data">
            <div class="row gtr-uniform">
                <div class="col-6 col-12-small" align="center">
                    <span class="image editar">
                        <?php echo '<img src="'.base_url.'uploads/images/'.$_SESSION["identidad"] -> fotoNormal.'" alt=""/>' ?> 
					</span>
                    <input accept="image/*" type="file" name="imagen" id="imagen"/>
                </div>
                <div class="col-6 col-12-small">
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-small alinearVertical">
                            <input type="text" name="username" placeholder="Username" readonly value="<?php echo $_SESSION["identidad"] -> username ?>">
                        </div>
                        <div class="col-12 col-12-small alinearVertical">
                            <input type="text" name="apodo" placeholder="Apodo" value="<?php echo $_SESSION["identidad"] -> apodo ?>"/>
                        </div>
                        <div class="col-12 col-12-small alinearVertical">
                            <br>
                            <select name="nacionalidad" id="nacionalidad" >
                            <option selected hidden>Nacionalidad</option>
                            <?php 
                                while( $pais = mysqli_fetch_row($paises)){
                                    if($_SESSION["identidad"] -> idNacionalidad == strval($pais[0])){
                                        echo '<option value="'.$pais[0].'" selected="selected">'.$pais[1].'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$pais[0].'">'.$pais[1].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-12 col-12-small alinearVertical">
                            <input type="text" name="descripcionCorta" placeholder="Presentación"  value="<?php echo $_SESSION["identidad"] -> desCorta ?>"/>
                        </div>
                        <div class="col-12 col-12-small alinearVertical">
                            <textarea class="descripcion" name="descripcionLarga" rows="5" placeholder="Descripción perfil" ><?php echo $_SESSION["identidad"] -> desLarga ?></textarea>    
                        </div>
                        <div class="col-4 alinearVertical">
                            <select name="Dia" id="Dia" required="" >
                                <option selected hidden>Día</option>
                                <?php 
                                    for($i = 1; $i < 32; $i++){
                                        if(substr($_SESSION["identidad"] -> fechaNac, 8) == $i){
                                            echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                                        }
                                        else{
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-4 alinearVertical">
                            <select name="Mes" id="Mes" required="" >
                                <option selected hidden>Mes</option> 
                                <?php 
                                    for($i = 1; $i < 13; $i++){
                                        if(substr($_SESSION["identidad"] -> fechaNac, 5,2) == $i){
                                            echo '<option value="'.$i.'" selected="selected">'.$mes -> getMesVal_R($i).'</option>';
                                        }
                                        else{
                                            echo '<option value="'.$i.'">'.$mes -> getMesVal_R($i).'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-4 alinearVertical">
                            <select name="Año" id="Año" required="" >
                            <option selected hidden>Año</option> 
                                <?php 
                                    for($i = 1900; $i < 2022; $i++){
                                        if(substr($_SESSION["identidad"] -> fechaNac, 0, 4) == $i){
                                            echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                                        }
                                        else{
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 col-12-small alinearVertical">
                            <input type="text" name="FIDE" placeholder="IDFIDE"  value="<?php echo $_SESSION["identidad"] -> idFIDE ?>"/>
                        </div>
                        <div class="col-12">
                        <section align="center" >
                            <input  type="submit" value="Guardar cambios" />
                        </section> 
                        </div>
                    </div>
                </div>
            </div> 
            <br>                
        </form>
    </article>
</div>