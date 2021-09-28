        <section id ="login">
        <form action="#" method="POST">
            <h2>Login</h2><br>
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="email">Email:</label><input type="text" id="email" name="email" />
                </li>
                <li>
                    <label for="password">Password:</label><input type="password" id="password" name="password" />
                </li>
                <li>
                    <p>Seleziona il tuo ruolo:</p>
                    <input type="radio" id="cliente" name="ruolo" value="cliente" checked><label for="cliente">Cliente</label><br>
                    <input type="radio" id="organizzatore" name="ruolo" value="organizzatore"><label for="organizzatore">Organizzatore</label>
                </li>
                <li>
                    <input type="submit" name="submit" value="Invia"/>
                </li>
                <li>
                    <p>No account? <a href="login.php?action=1">Sign up!</a></p>
                </li>
            </ul>
        </form>
        </section>