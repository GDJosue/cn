<div id="main">
    <article class="post">
        <h2 align="center">Insignias Caballo Negro Chess Club.</h2>
        <form action ="<?=base_url?>administracion/torneoRegistrado" method="POST">
            <p align="justify">En esta ventana podras cargar y actualizar las insignias que los jugadores podran obtener/acceder</p>
            <div class="row gtr-uniform">
                <div class="col-4 col-12-small">
                    <input type="text" name="txtInsignia" placeholder="Nombre de la insignia" required/>
                </div>
                <div class="col-4 col-12-small">
                    <select name="tipoPuntos" id="tipoPuntos" required="">
						<option value="">Selecciona el tipo</option>
						<option value="1">Merito</option>
						<option value="2">Paga</option>
					</select>
                </div>
                <div class="col-4 col-12-small">
                    <input type="text" name="txtPrecio" placeholder="Costo en trofeos de la insignia" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                </div>
                <div class="col-12 col-12-small alinearVertical">
                    <textarea class="descripcion" name="descripcionLarga" rows="5" placeholder="Descripción de la insignia" ></textarea>    
                </div>
                <div class="col-12 col-12-small" align="center">
                    <input accept="image/*" type="file" name="imagen" id="imagen"/>
                </div>
                <div class="col-12">
                    <div align="center">
                        <input name="gInsignia" type="submit" value="Guardar insignia" />
                    </div>
                </div>
            </div>
        </form>
    </article>
</div>