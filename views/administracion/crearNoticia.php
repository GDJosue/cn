<div id="main">
    <article class="post">
        <h2 align="center">Bienvenido al sistema para crear noticias de CNCC.</h2>
        <form action ="<?=base_url?>administracion/crearNoticia" method="POST" enctype="multipart/form-data">
            <p align="justify">Coloca la información y fotos relacionadas a tu noticia.</p>
            <div class="row gtr-uniform">
                <div class="col-12 col-12-small">
                    <input type="text" name="tituloNoticia" placeholder="Titulo de la noticia" required/>
                </div>
                <div class="col-12 col-12-small">
                    <input type="text" name="resumenNoticia" placeholder="Resumen de la noticia" required/>
                </div>
                <div class="col-12 col-12-small">
                    <textarea name="contenidoNoticia" placeholder="Contenido de la Noticia"></textarea>
                </div>
                <div class="col-12 col-12-small">
                    <p align="center">Sube las fotos de tu noticia</p>
                </div>
                <div class="col-12">
                    <div align="center">                            
                        <input type="file" name="imagen[]" value="" multiple>
                        <br>
                        <input type="submit" value="Crear noticia">
                    </div>
                </div>
            </div>
        </form>
    </article>
</div>
