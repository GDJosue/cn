<div id="main">
    <article class="post">
        <h2 align="center">Bienvenido al sistema para cambiar el mes de la tabla de rendimiento de CNCC</h2>
        <form action ="<?=base_url?>administracion/cambiarMesTR" method="POST" enctype="multipart/form-data">
            <p align="justify">Selecciona el mes del año 2023 que quieres mostrar en la tabla de rendimiento</p>
            <div class="row gtr-uniform">
                <div class="col-12 col-12-small">
                    <select name="mesTR" id="mesTR" required="">
						<option value="" disable>Selecciona el mes que deseas</option>
						<option value="1">Enero</option>
						<option value="2">Febrero</option>
						<option value="3">Marzo</option>
						<option value="4">Abril</option>
						<option value="5">Mayo</option>
						<option value="6">Junio</option>
						<option value="7">Julio</option>
						<option value="8">Agosto</option>
						<option value="9">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
                </div>
                <div class="col-12">
                    <div align="center">                            
                        <input type="submit" name="actualizarMes" value="Actualizar">
                    </div>
                </div>
            </div>
        </form>
    </article>
</div>