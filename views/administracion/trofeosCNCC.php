<div id="main">
    <article class="post">
        <h2 align="center">Bienvenido al sistema para otorgar o retirar puntos trofeo de CNCC</h2>
        <form action ="<?=base_url?>administracion/trofeosCNCC" method="POST" enctype="multipart/form-data">
            <p align="justify">Coloca el destinatario de los puntos y el concepto de esos puntos, desde este menu igual puedes disminuir los puntos del jugador, para sumar solamente pon la cantidad, y para quitar usa el signo <strong>-</strong> ejemplo: <strong>Para quitar 5 puntos se pondra "-5"</strong></p>
            <div class="row gtr-uniform">
                <div class="col-12 col-12-small">
                    <input type="text" name="usernameTrofeo" placeholder="Username" required/>
                </div>
                <div class="col-6 col-12-small">
                    <input type="text" name="conceptoTrofeo" placeholder="Concepto de los puntos" required/>
                </div>
                <div class="col-6 col-12-small">
                    <input type="text" name="integerTrofeo" value="" placeholder="Puntos a otorgar" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  
                </div>
                 <div class="col-12">
                    <div align="center">                            
                        <input type="submit" name="OtorgarP" value="Otorgar puntos">
                    </div>
                </div>
            </div>
        </form>
    </article>
</div>
