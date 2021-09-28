        <?php if(isset($templateParams["titolo_pagina"])): ?>
        <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
        <?php endif;?>
        <?php if(isset($templateParams["logoutsuccess"])): ?>
        <p><?php echo $templateParams["logoutsuccess"]; ?></p>
        <?php endif; ?>
        <?php foreach($templateParams["eventi"] as $evento): ?>
        <article>
            <header>
                <div>
                    <img src="<?php echo UPLOAD_DIR.$evento["imgevento"]; ?>" alt="" />
                </div>
                <h2><?php echo $evento["titoloevento"]; ?></h2>
                <p><?php echo $evento["dataevento"]; ?> - <?php echo $evento["oraevento"]; ?></p>
            </header>
            <section>
                <p><?php echo $evento["anteprimaevento"]; ?></p>
            </section>
            <footer>
                <a href="evento.php?id=<?php echo $evento["idevento"]; ?>">Vai all'evento</a>
            </footer>
        </article>
        <?php endforeach; ?>