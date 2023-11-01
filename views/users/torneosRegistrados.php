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
								<h2 align="center">Torneos registrados por el mes: <?php echo $fecha -> getMes(); ?></h2>
								<br>
                                        <div class="table-wrapper" align="center">
                                            <table align="center" width="100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th style="text-align: center">Nombre del torneo</th>
                                                        <th style="text-align: center">Fecha del torneo</th>
                                                        <th style="text-align: center">Bonificación</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
								<?php 
									foreach($tTorneos as $torneo){
                                        if($torneo["bonificacionT"] == "1"){
                                            $aux="puntos normales";
                                        }
                                        else if($torneo["bonificacionT"] == "3"){
                                            $aux="puntos triples";
                                        }
                                        else{
                                            $aux="puntos dobles";
                                        }
                                        echo '</div>

                                                <tr>
                                                    <td align="center"> 
                                                        <a href="https://lichess.org/tournament/'.$torneo["idTorneo"].'"
                                                        <p align="center">'.$torneo["nombreT"].'</p>
                                                        </a>
                                                    </td>
                                                    <td align="center">
                                                        <p>'.$torneo["fechaT"].'</p>
                                                    </td>
                                                    <td align="center">
                                                        <p>'.$aux.'</p>
                                                    </td>
                                                </tr>';
                                                
                                }
								?> 
										</tbody>
									</table>
								
							</article>

					</div>