        <section id="carello">
        <h2>Carrello</h2>
        <?php
        if(isset($_SESSION["carrello"])){
            $total_quantita = 0;
            $total_price = 0;
        ?>	
        <a href="processa-carrello.php?action=empty" class="empty-cart">Svuota il carrello</a><br><br>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th>Nome</th>
                <th>Quantità</th>
                <th>Prezzo Singolo</th>
                <th>Prezzo Totale</th>
                <th>Rimuovi</th>
            </tr>	
            <?php		
                foreach ($_SESSION["carrello"] as $item){
                    $item_price = $item["quantita"]*$item["prezzo"];?>
                    <tr>
                        <td><?php echo $item["nomeProd"]; ?></td>
                        <td><?php echo $item["quantita"]; ?></td>
                        <td><?php echo "€ ".$item["prezzo"]; ?></td>
                        <td><?php echo "€ ". number_format($item_price,2); ?></td>
                        <td><a href="processa-carrello.php?action=remove&idProd=<?php echo $item["idProd"]; ?>"><img id="bidone" src="./utils/iconaBidone.png" alt="Remuovi evento" /></a></td>
                    </tr>
                    <?php
                        $total_price += ($item["prezzo"]*$item["quantita"]);
                }?>
                <tr>
                    <td colspan="3" align="right">Totale:</td>
                    <td align="right" colspan="2"><strong><?php echo "€ ".number_format($total_price, 2); ?></strong></td>
                </tr>
        </tbody>
        </table>
        <br><br>
        
        <a href="#open-modal" class="send-button">Procedi all'acquisto</a>
        <div id="open-modal" class="modal-window">
        <div>
            <a href="#modal-close" title="Close" class="modal-close">&times;</a>
            <h2>Checkout</h2><br>
            <h5>Seleziona metodo di pagamento:</h5>
            <input type="radio" id="tipopagamento" value="tipopagamento" checked><label for="bonifico">Pagamento all'arrivo</label><br>
            <p>Il pagamento dell'importo verrà effettuato presso la biblioteca, prima dell'evento.</p>
            <a href="processa-carrello.php?action=buy&modal-close" title="Close" class="send-button">Conferma</a>
        </div>
        </div>

        <?php
            } else { ?>
            <h3>Il tuo carrello è vuoto</h3>
        <?php } ?>
        </section>