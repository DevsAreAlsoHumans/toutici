<header class="container">
    <nav>
        <li>
            <h2>
                <a href="/">Tout ici</a>
            </h2>
        </li>
        <li>
            <input type="search" id="search" name="search" placeholder="Chercher une annonce" />
        </li>
        <li>
            <?php
            if (isset($user)) {
                echo "<a href='/user/" . $user['id'] . "'>";
                echo "<button>Bienvenue <strong>" . $user['first_name'] . "</strong></button>";
                echo "</a>";
            } else {
                echo "<ul>
                        <li>
                            <a href='/login'>
                                <button>
                                    Se Connecter
                                </button>
                            </a>
                        </li>
                        <li></li>
                        <li>
                            <a href='/register'>
                                <button>
                                    Créer un compte
                                </button>
                            </a>
                        </li>
                    </ul>
                ";
            }
            ?>
        </li>
    </nav>
</header>