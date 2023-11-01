				<!-- Main -->
					<!-- Wrapper -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<div class="row gtr-uniform">
											<div class="col-10">
												<h2 align="center"><a href="single.html">Tabla de rendimiento</a></h2>
												<p align="center">La tabla de rendimiento de CNCC, es un medio para incentivar la participación de nuestros jugadores.<strong><br>Y la principal forma de obtener Cahuayohs</strong></p>
											</div>
											<div class="col-2">
												<span class="image fit"><img src="<?=base_url?>images/logoRendimiento.png" alt="" /></span>
											</div>
										</div>
									</div>
								</header>
								<h2 align="center">Torneos jugados por: <?php echo $username; ?> durante el mes: <?php echo $fecha -> getMes(); ?></h2>
								<div class="table-wrapper">
                                                <table width=100%>
                                                    <thead>
                                                        <tr align="center">
                                                            <th style="text-align: center">Puntos realizados</th>
                                                            <th style="text-align: center">Nombre del torneo</th>
                                                            <th style="text-align: center">Bonificación</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
    								<?php 
    									foreach($tRendimiento as $torneo){
                                            if($torneo["bonificacionT"] == "1"){
                                                $aux="puntos normales";
                                            }
                                            else{
                                                $aux="puntos dobles";
                                            }
                                            echo '
                                                    <tr>
                                                        <td align="center"> 
                                                            <p align="center">'.$torneo["puntos"].'</p>
                                                        </td>
                                                        <td align="center">
                                                        <a href="https://lichess.org/tournament/'.$torneo["idTorneo"].'"
                                                        <p>'.$torneo["nombreT"].'</p>
                                                        </a>
                                                            
                                                        </td>
                                                        <td align="center">
                                                            <p>'.$torneo["fechaT"].'</p>
                                                        </td>
                                                    </tr>';
                                    }
    								?> 
    										</tbody>
    									</table>
    								</div>
							</article>

					</div>