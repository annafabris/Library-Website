        <section id="contatti">
            <h2>Autori del Blog</h2>
            <table>
                <tr>
                    <th id="autore">Autore</th><th id="email">Email</th>
                    <?php if(getUserRole()=="admin"){ ?><th id="azione">Azione</th><?php }?>
                </tr>
                <?php foreach($templateParams["autori"] as $autore): ?>
                <tr>
                    <?php if($autore["attivo"] || getUserRole()=="admin"){?>
                        <th id="<?php echo getIdFromName($autore["nome"]); ?>"><?php echo $autore["nome"]; ?></th>
                        <td headers="email <?php echo getIdFromName($autore["nome"]); ?>"><?php echo $autore["email"]; ?></td>
                        <?php if(getUserRole()=="admin"){ ?>
                        <td>
                            <a href="contatti.php?action=autore&id=<?php echo $autore["idautore"]; ?>"><?php if($autore["attivo"] == 1){?>Banna<?php }else{?>Permetti<?php }?></a>
                        </td>
                        <?php }?>
                    <?php }?>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php if(getUserRole()=="admin") {?><br><br>
                <h2>Clienti iscritti</h2>
                <table>
                <tr>
                    <th id="cliente">Cliente</th><th id="email">Email</th><th id="azione">Azione</th>
                </tr>
                <?php foreach($templateParams["clienti"] as $cliente): ?>
                <tr>
                    <th id="<?php echo getIdFromName($cliente["nome"]); ?>"><?php echo $cliente["nome"]; ?></th>
                    <td headers="email <?php echo getIdFromName($cliente["nome"]); ?>"><?php echo $cliente["email"]; ?></td>
                    <td>
                    <a href="contatti.php?action=cliente&id=<?php echo $cliente["idcliente"]; ?>"><?php if($cliente["attivo"] == 1){?>Banna<?php }else{?>Permetti<?php }?></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php }?>
        </section>