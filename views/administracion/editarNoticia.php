<div id="main">
    <article class="post">
        <h2 align="center">Editar noticia CNCC</h2>
        <form action ="<?=base_url?>administracion/editarNoticia" method="POST" enctype="multipart/form-data">
            <p align="center">¿Qué noticia vas a editar?</p>
            <div class="row gtr-uniform">
                <div class="col-6 col-12-small">
                    <input type="text" name="idNoticia" placeholder="Id de la noticia" required/>
                </div>
                <div class="col-6 col-12-small">
                    <input type="submit" style="width:100%"  value="Buscar noticia">
                </div>
                <br>
                <br>
                <div class="col-12 col-12-small">
                   <table width="100%" style='padding: 1em;'>
                       <thead>
                            <tr>
                                <th style='text-align: center'>Id</th>
                                <th style='text-align: center'>Titulo noticia</th>
                                <th style='text-align: center'> Resumen noticia</th> 
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                        foreach($noticias as $noticia){
                            if($noticia){
                                echo "<tr>
                                    <td style='text-align: center'>".$noticia["idblogs"]."</td>
                                    <td style='text-align: center'>".$noticia["tituloB"]."</td>
                                    <td style='text-align: center'>".$noticia["resumenB"]."</td>
                                </tr>";
                            }
                        }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
        </form>
    </article>
</div>
