<div id="main">
    <article class="post">
        <h2 align="center">Editar noticia CNCC</h2>
        <form action ="<?=base_url?>administracion/completarEdicion" method="POST" enctype="multipart/form-data">
            <p align="center">Editor de noticia</p>
            <div class="row gtr-uniform">
                <div class="col-12 col-12-small">
                    <p>Esta es la noticia con ID:</p>
                    <input type="text" name="idNoticiaE" placeholder="Titulo de la noticia" value="<?php echo $informacionNoticia['idBlogs']; ?>" disable required/>
                </div>
                <div class="col-12 col-12-small">
                    <label>Titulo de la noticia:</label>
                    <input type="text" name="tituloNoticiaE" placeholder="Titulo de la noticia" value="<?php echo $informacionNoticia['tituloB']; ?>" required/>
                </div>
                <div class="col-12 col-12-small">
                    <label>Resumen de la noticia:</label>
                    <input type="text" name="resumenNoticiaE" placeholder="Resumen de la noticia" value="<?php echo $informacionNoticia["resumenB"]; ?>" required/>
                </div>
                <div class="col-12 col-12-small">
                    <label>Contenido noticia:</label>
                    <textarea name="contenidoNoticiaE" placeholder="Contenido de la Noticia" rows="10"><?php echo $informacionNoticia["textoB"]; ?></textarea>
                </div>
                <div class="col-12 col-12-small">
                    <label>Visibilidad noticia:</label>
                    <select name="visibleE">
                        <option value="0" <?php if ($informacionNoticia["visible"] == 0) echo "selected"; ?>>No visible</option>
                        <option value="1" <?php if ($informacionNoticia["visible"] == 1) echo "selected"; ?>>Visible</option>
                    </select>
                </div>
                <div class="col-6 col-12-small">
                    <input type="submit" name="Cancelar" style="width:100%"  value="Cancelar">
                </div>
                <div class="col-6 col-12-small">
                    <input type="submit" name="Continuar" style="width:100%"  value="Guardar cambios">
                </div>
            </div>
        </form>
    </article>
</div>
