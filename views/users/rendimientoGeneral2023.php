<div id="main">
    <article class="post">
        <h2 align="center">Tabla de rendimiento general 2023</h2>
        <p align="justify">
            En esta lista se encuentran todos los jugadores con sus respectivos TR de todo el año 2023. 
        </p>
        <h2 align="center">Top 3 tabla de rendimiento general 2023</h2>
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