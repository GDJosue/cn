<div id="main">
	<article class="post">
		<p align="Justify"><?php echo $usuario -> desLarga; ?></p>
	</article>
	<article class="post">
		<header>
			<div class="title">
				<h2>Logros</h2>
				<p align="justify">Caballo Negro Chess Club es fuerte gracias a sus jugadores, aquí podemos 
					observar los logros destacados de <?php echo $usuario -> username; ?> en el equipo.
				</p>
			</div>
			<div class="meta">
				<span class="image fit"><img src="<?=base_url?>images/logros.png" alt="" /></span>
			</div>
		</header>
		<?php 
			if($logros != null)
			{
				foreach($logros as $diplomas)
				{
					echo '
					<div class="box alt">
						<span class="image fit"><img src="'.base_url.'images/'. $diplomas["nombrediplima"].'" alt="" /></span>
					</div>
					';
				}
			}	
		?>
	</article>
	<article class="post">
		<header>
			<div class="title">
				<h2>Rendimiento del jugador</a></h2>
				<p>Actuaciones en los diferentes ritmos de juego </p>
			</div>
			<div class="meta">
				<p>A la fecha:</p>
				<time class="published" datetime="2022-09-26"><?php echo $fecha -> getMes(); ?></time>
			</div>
		</header>	
		<div class="box alt">
		<div class="table-wrapper">
                                            <table>
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
                                                        <p align="center">'.$torneo["nombreT"].'</p>
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
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<header>	
									<div  class="perfil">
										<?php 
											echo'<span class="image perfil">
												<img src="'.base_url.'uploads/images/'.$usuario -> fotoNormal.'" alt=""/>
											</span>';
										?>	
										<div class="iconoFondo">
											<div align="center">
											    <div class="user-profile" align="center">
                                                    <h3 class="sinSalto">
                                                        <a href="https://lichess.org/@/<?php echo $usuario->username; ?>">
                                                            <?php echo $usuario->username; ?>
                                                        </a>
                                                    </h3>
                                                    <?php 
                                                        if (!empty($usuario->insignia)) {
                                                            echo '
                                                            <div class="user-insignia">
                                                                <span class="image perfil">
                                                                    <img src="' . base_url . 'uploads/insignias/' . $usuario->insignia . '" alt=""/>
                                                                </span>
                                                            </div>';
                                                        }
                                                    ?>
                                                </div>
												<i><strong><?php echo $usuario -> apodo; ?></strong></i>	
												<br>
												<br>
											</div>
											<p align="center">
												<strong>
													<?php echo $usuario -> desCorta; ?>
												</strong>
												<br>
												Fecha de nacimiento: 
												<br>
												<strong>
													<?php echo $usuario -> fechaNac; ?>
												</strong>
												<br>ID FIDE: 
												<strong>
													<?php echo $usuario -> idFIDE; ?>
												</strong>
												<p align="center">Trofeos:<strong><?php echo $usuario -> trofeos; ?></strong></p>
											</p>
										</div>
									</div>
								</header>
							</section>

						<!-- About -->
							<section class="blurb">
								<h2>Acerca de nosotros</h2>
								<p align="justify"><Strong>Caballo Negro Chess Club</Strong> Es un equipo de ajedrez Online y presencial que busca fomentar 
								el ajedrez en la comunidad de habla hispana.</p>
								<ul class="actions">
									<li><a href="#" class="button">Leer más</a></li>
								</ul>
							</section>

					</section>