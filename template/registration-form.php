    <section id ="login">
    <form action="login.php" method="POST">
            <h2>Registrati</h2>
            <ul>
                <li>
                    <label for="email">Email</label><input type="text" id="email" name="email" required/>
                </li>
                <li>
                    <label for="password">Password:</label><input type="password" id="password" name="password" required/>
                </li>
                <li>
                    <label for="nome">Nome e cognome:</label><input type="text" id="nome" name="nome" required/>
                </li>
                <li>
                    <p>Seleziona il tuo ruolo:</p>
                    <input type="radio" id="cliente" name="ruolo" value="cliente" checked><label for="cliente"> Cliente</label><br>
                    <input type="radio" id="organizzatore" name="ruolo" value="organizzatore"><label for="organizzatore"> Organizzatore</label>
                </li>
                <li>
                    <input type="submit" name="submit" value="Invia"/>
                </li>
                <li>
                    <p>Hai già un'account? <a href="login.php">Sign in</a></p>
                </li>
            </ul>
        </form>
        </section>
