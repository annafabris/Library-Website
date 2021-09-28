        <section id="evento">
            <h2>Eventi</h2>
            <?php if(isset($templateParams["formmsg"])):?>
            <p><?php echo $templateParams["formmsg"]; ?></p>
            <?php endif; ?>
            <a href="gestisci-eventi.php?action=1" id="inserimento">Inserisci Evento</a><br><br>
            <table>
                <tr>
                    <th>Titolo</th><th>Immagine</th><th>Azione</th>
                </tr>
                <?php foreach($templateParams["eventi"] as $evento): ?>
                <tr>
                    <td><?php echo $evento["titoloevento"]; ?></td>
                    <td><img src="<?php echo UPLOAD_DIR.$evento["imgevento"]; ?>" alt="" /></td>
                    <td>
                        <a href="gestisci-eventi.php?action=2&id=<?php echo $evento["idevento"]; ?>">Modifica</a> /
                        <a href="gestisci-eventi.php?action=3&id=<?php echo $evento["idevento"]; ?>">Cancella</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>