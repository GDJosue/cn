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
											<div class="col-12">
											<section>
												<ul class="actions stacked">
													<li><a href="<?=base_url?>torneo/torneosRegistrados" class="button large fit">Ver torneos registrados</a></li>
												</ul>
											</section>
											<div class="col-12">
											<section>
												<ul class="actions stacked">
													<li><a href="<?=base_url?>torneo/rendimiento2023" class="button large fit">Ver tabla de rendimiento 2023</a></li>
												</ul>
											</section>
											</div>
										</div>
									</div>
								</header>
								<h2 align="center">ROAD 30K TR<?php echo $fecha -> getMes(); ?></h2>
								
								<p><?php 
								echo "<p align='center'>Hasta el momento se han realizado: <strong>".$meta." puntos en la tabla de rendimiento </strong</p>"; 
								?></p>
                                <div class="progress-bar">
                                    <div class="progress" id="progress"></div>
                                  </div>
                                
                                  <?php
                                  // Lógica PHP para obtener los valores del progreso
                                  $currentPoints = $meta;
                                  $targetPoints = 30000;
                                  ?>
                                  
                                <script src="<?=base_url?>assets/js/main.js"></script>
                                <script>
                                // Llama a la función de JavaScript pasando los valores de PHP
                                updateProgress(<?php echo $currentPoints; ?>, 30000);
                                </script>
                                <br>
								<h2 align="center">Top 3 tabla de rendimiento <?php echo $fecha -> getMes(); ?></h2>
								<div class="row gtr-uniform">
								<?php 
									$aux = 0;
									foreach($tRendimiento as $jugador){
										switch($aux)
										{
											case 0:{
												$posicion = "primerLugar";
											}break;
											case 1:{
												$posicion = "segundoLugar";
											}break;
											case 2:{
												$posicion = "tercerLugar";
											}break;
										}
										if($aux <= 2){
											echo '<div class="col-4 col-12-small">
														<div class="'.$posicion.'">
															<span class="image fit"><img src="'.base_url.'uploads/images/'.$jugador["fotoNormal"].'" alt="" class="bordeFoto"/></span>
															';
						                ?>
                                                       <div class="user-profile" align="center">
                                                            <h3 class="sinSalto tituloBlanco">
                                                                <a href="<?php echo base_url; ?>torneo/rendimientoDetallado&username=<?php echo $jugador["username"]; ?>">
                                                                    <?php echo $jugador["username"]; ?>
                                                                </a>
                                                            </h3>
                                                            <?php 
                                                                if (!empty($jugador["insignia"])) {
                                                                    echo '
                                                                    <div class="user-insignia">
                                                                        <span class="image perfil">
                                                                            <img src="' . base_url . 'uploads/insignias/' . $jugador["insignia"] . '" alt=""/>
                                                                        </span>
                                                                    </div>';
                                                                }
                                                            ?>
                                                        </div>
                                        <?php
															echo '<blockquote align="justify">"'.$jugador["desCorta"].'"</blockquote>
															<p align="center">Por haber realizado <strong class="strongBlanco">'.$jugador["PuntosTotales"].' puntos</strong> hasta la fecha</p>
														</div>
													</div>';
										}
										else if($aux == 3){
											echo '</div>
											<br>
											<h2 align="center">Tabla de rendimiento</h2>
											<div class="table-wrapper">
												<table>
													<thead>
														<tr align="center">
															<th style="text-align: center">Puesto</th>
															<th style="text-align: center">Foto</th>
															<th style="text-align: center">Jugador</th>
															<th style="text-align: center">Puntos realizados</th>
														</tr>
													</thead>
													<tbody>
													<tr>
														<td><h2 align="center">4</h2></td>
														<td align="left" width="10%">
															<img src="'.base_url.'uploads/images/'.$jugador["fotoNormal"].'" alt="" class="fotoTabla">
														</td>
														<td align="center" width="35%">
															<a href="'.base_url.'torneo/rendimientoDetallado&username='.$jugador["username"].'">
															<p class="sinSalto">'.$jugador["username"].'</p><img src="<?=base_url?>images/logoPeon.png" alt="" class="logoNombre"/>
															</a>
														</td>
														<td align="center">'.$jugador["PuntosTotales"].'</td>
													</tr>';

										}
										else{
											echo 
											'<tr>
												<td><h2 align="center">'.($aux+1).'</h2></td>
												<td align="left" width="10%">
													<img src="'.base_url.'uploads/images/'.$jugador["fotoNormal"].'" alt="" class="fotoTabla">
												</td>
												<td align="center" width="35%">
													<a href="'.base_url.'torneo/rendimientoDetallado&username='.$jugador["username"].'">
													<p class="sinSalto">'.$jugador["username"].'</p><img src="<?=base_url?>images/logoPeon.png" alt="" class="logoNombre"/>
													</a>
												</td>
												<td align="center">'.$jugador["PuntosTotales"].'</td>
											</tr>';
										}
										$aux ++;
									}
								?> 
										</tbody>
									</table>
								</div>
								
							</article>

					</div>