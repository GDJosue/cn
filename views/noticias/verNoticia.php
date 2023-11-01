<div id="main">
    <article class="post">
		<header>
			<div class="title">
                <h2><a href="#">
                    <?php 
                        $parser = new Parsedown();
    				    $markdownContent = $informacionNoticia["tituloB"];
    				    $html = $parser->text($markdownContent);
        				echo $html; 
                    ?></a>
                </h2>
                <p>
                    <?php 
                        $parser = new Parsedown();
    				    $markdownContent = $informacionNoticia["resumenB"];
    				    $html = $parser->text($markdownContent);
        				echo $html; 
                    ?>
                </p>
		    </div>
			<div class="meta">
				<time class="published" datetime="2015-11-01">
				<a href="#" class="author"><span class="name"><?php echo $informacionNoticia["fechaB"]; ?></span><img src="images/avatar.jpg" alt=""></a>
				</time>
				<a href="#" class="author"><span class="name"><?php echo $informacionNoticia["usernameB"]; ?></span><img src="images/avatar.jpg" alt=""></a>
			</div>
		</header>
        <?php
            #echo var_dump($fotosNoticia);
        ?>
		<span class="image featured"><img src="<?=base_url?>images/<?php echo $fotosNoticia[0]["nombreFoto"]?>" alt=""></span>
        <p align="justify">
            <?php 
                $parser = new Parsedown();
    			$markdownContent = $informacionNoticia["textoB"];
    			$html = $parser->text($markdownContent);
        		echo $html; 
            ?>
        </p>	
        <div class="row gtr-uniform">
            <?php 
                foreach($fotosNoticia as $foto){
                    echo "
                        <div class='col-4 col-12-small'>
                            <span class='image featured'><img src='".base_url."images/".$foto['nombreFoto']."' alt=''></span>
                        </div>
                    ";
                }
            ?> 
        </div>
	</article>
</div>