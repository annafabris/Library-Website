        <section id ="articoloform">
        <?php 
            $evento = $templateParams["evento"]; 
            $azione = getAction($templateParams["azione"])
        ?>
        <form action="processa-eventi.php" method="POST" enctype="multipart/form-data">
            <h2>Gestisci Evento</h2>
            <?php if($evento==null): ?>
            <p>Evento non trovato</p>
            <?php else: ?>
            <ul>
                <li>
                    <label for="titoloevento">Titolo:</label><input type="text" id="titoloevento" name="titoloevento" value="<?php echo $evento["titoloevento"]; ?>" required />
                </li>
                <li>
                    <label for="testoevento">Testo Evento:</label><textarea id="testoevento" name="testoevento" required><?php echo $evento["testoevento"]; ?></textarea>
                </li>
                <li>
                    <label for="anteprimaevento">Anteprima Evento:</label><textarea id="anteprimaevento" name="anteprimaevento" required><?php echo $evento["anteprimaevento"]; ?></textarea>
                </li>
                <li>
                    <label for="dataevento">Data:</label><input type="text" id="dataevento" name="dataevento" value="<?php echo $evento["dataevento"]; ?>" required />
                </li>
                <li>
                    <label for="oraevento">Ora:</label><input type="text" id="oraevento" name="oraevento" value="<?php echo $evento["oraevento"]; ?>" required />
                </li>
                <li>
                    <?php if($templateParams["azione"]!=3): ?>
                    <label for="imgevento">Immagine Evento</label><input type="file" name="imgevento" id="imgevento" />
                    <?php endif; ?>
                    <?php if($templateParams["azione"]!=1): ?>
                    <img src="<?php echo UPLOAD_DIR.$evento["imgevento"]; ?>" alt="" />
                    <?php endif; ?>
                </li>
                <li>
                    <label for="prezzo">Prezzo:</label> 
                    <input type="number" id="prezzo" name="prezzo" min="1" max="999999" value = <?php echo $evento["prezzo"]; ?>>
                </li>
                <li>
                    <label for="postitotali">Posti Totali:</label> 
                    <input type="number" id="postitotali" name="postitotali" min="1" max="999999" value = <?php echo $evento["postitotali"]; ?>>
                </li>
                <li>
                    <input type="submit" name="submit" value="<?php echo $azione; ?> Evento" />
                    <a href="login.php">Annulla</a>
                </li>
            </ul>
                <?php if($templateParams["azione"]!=1): ?>
                    <input type="hidden" name="idevento" value="<?php echo $evento["idevento"]; ?>" />
                    <input type="hidden" name="oldimg" value="<?php echo $evento["imgevento"]; ?>" />
                    <?php endif;?>

                    <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>" />
                <?php endif;?>
        </form>
        </section>