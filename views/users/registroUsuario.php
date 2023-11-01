<div id="main">
    <article class="post">
        <h2 align="center">Caballo Negro Chess Club te da la bienvenida</h2>
        <p align="justify">Proceso de registro en nuestra pagina web. A continuación deberas indicar tu usuario en Lichess, toma en cuenta que: 
        <br>*Debes de haber jugado <strong>al menos un torneo para CNCC </strong>(Sí todavia no eres parte del equipo, <a href="https://lichess.org/team/caballo-negro-chess-club">Únete aquí</a>)
        <br>*El nombre de usuario distingue entre mayusculas y minusculas en caso de no funcionar probar combinaciones.
        <br>*Al ingresar aceptas las normas comunitarias del equipo <a href="www.google.com">Leer aquí</a>    
        </p>
        <form action ="<?=base_url?>usuario/buscar" method="POST">
        <p align="justify">Bienvenido Caballo, te llegará un mensaje a tu cuenta de Lichess por parte de alguno de nuestros administradores <strong>(Xokut, L1l1ana, Josue1888)</strong>
            en los proximos días. (Procuraremos no tardar más de 3 días habiles) </p>
            <input type="text" name="username" placeholder="Jugador" required/>
            <br>
            <div align="center">
                <input  type="submit" value="Buscar jugador" />    
            </div>
        </form>
    </article>
</div>