<div id="main">
    <article class="post">
        <h2 align="center">Noticias Caballo Negro Chess Club</h2>
        <p align="justify">Aquí encontraras noticias publicadas por nuestros miembros o administradores, publicaciones de torneos Online y presenciales, así como logros de nuestro equipo, incentivamos a todos a participar y crear contenido para nuestra comunidad ajedrecista.</p>
    </article>
    <article class="post">
        <div class="row gtr-uniform">
            <?php
                foreach($noticias as $noticia){
                    if ($noticia["visible"] == "1")
                    {
                    echo '
                    <div class="col-3 col-12-small">
                        <article class="mini-post">
                            <header>
                                <h3><a href="'.base_url.'noticias/verNoticia&noticia='.$noticia["idblogs"].'">'.$noticia["tituloB"].'</a></h3>
                                <time class="published">'.$noticia["fechaB"].'</time>
                            </header>
                            <a href="'.base_url.'noticias/verNoticia&noticia='.$noticia["idblogs"].'" class="image"><img src="'.base_url.'images/'.$noticia["nombreFoto"].'" alt=""></a>
                        </article>
                    </div>
                    ';
                    }
                }
            ?>
        </div>
    </article>
</div>