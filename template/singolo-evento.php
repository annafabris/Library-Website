        <?php if(count($templateParams["evento"])==0): ?>
        <article id ="evento">
            <p>evento non presente</p>
        </article>
        <?php 
            else:
                $evento = $templateParams["evento"][0];
        ?>
        <article id ="evento">
            <header>
                <div>
                    <img src="<?php echo UPLOAD_DIR.$evento["imgevento"]; ?>" alt="" />
                </div>
                <h2><?php echo $evento["titoloevento"]; ?></h2><br>
                <h5><?php echo $evento["dataevento"]; ?> - <?php echo $evento["oraevento"]; ?></h5><br>
            </header>
            <section>
                <p><?php echo $evento["testoevento"]; ?></p>
                <h5>Iscritti: <?php echo $evento["iscritti"]; ?>/<?php echo $evento["postitotali"]; ?></h5>
                <?php if ($evento["iscritti"] >= $evento["postitotali"]){?>
                <p>Mi dispiace ma non ci sono più posti disponibili</p>
                
                <?php } else {?>
                <h5 id="prezzoBiglietto">Prezzo: <?php echo $evento["prezzo"]; ?>€ </h5> 
                <form id="prezzo" method="post" action="processa-carrello.php?action=add&idProd=<?php echo $evento["idevento"]; ?>">
                    <h5>Numero biglietti:    
                    <input type="number" id="quantita" name="quantita" min="1"  max="<?php echo $evento["postitotali"] - $evento["iscritti"]; ?>" value="1"/>
                    <?php if(isUserLoggedIn()){?>
                        <div class="center">
                            <input type="submit" value="Aggiungi al carello" /></h5>
                        </div>
                    <?php }?> 
                </form>
                <?php }?>
            </section>
        </article>
        <?php endif; ?>
