<div id="main">
    <article class="post">
        <h2 align="center">Bienvenido al sistema para actualizar la tabla de rendimiento.</h2>
        <form action ="<?=base_url?>administracion/torneoRegistrado" method="POST">
            <p align="justify">Ingresar los datos necesarios para registrar el torneo en la tabla de rendimiento.</p>
            <div class="row gtr-uniform">
                <div class="col-12 col-12-small">
                    <input type="text" name="idTorneo" placeholder="Link del torneo" required/>
                </div>
                <div class="col-6 col-12-small">
                    <select name="tipoPuntos" id="tipoPuntos" required="">
						<option value="">Selecciona el tipo del torneo</option>
						<option value="1">Puntos normales</option>
						<option value="2">Puntos dobles</option>
						<option value="3">Puntos triples</option>
					</select>
                </div>
                <div class="col-6 col-12-small">
                    <select name="ligaPertenencia" id="ligaPertenencia" required="">
						<option value="">Liga a la que pertenece</option>
						<option value="1">No pertenece a ninguna liga</option>
					</select>
                </div>
                <div class="col-12">
                    <div align="center">
                        <input  type="submit" value="Registrar torneo" />
                    </div>
                </div>
            </div>
        </form>
    </article>
</div>
