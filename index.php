<?php require_once("cabecalho.php") ?>

<main class="main_container sem-scroll">
    <header>
        <nav class="navbar bg-body-tertiary fixed-top header_top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="img/<?php echo $logo_sistema ?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <?php echo $nome_sistema ?>
                </a>

                <a class="text-dark" href="#popup1">
                    <big>
                        <span class="bi bi-cart4 icone_cart">
                            <small><small>
                                    <span class="position-absolute top-10 start-90 translate-middle badge rounded-pill bg-danger">
                                        0
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </small></small>
                    </big>
                </a>
            </div>
        </nav>
        <!-- Poppup1 -->
        <?php require_once("carrinho.php") ?>
    </header>

    <section class="row cards_card ">
        <div class="menu-title_">
            <h3 class="sem-scroll">- Cardápio -</h3>
        </div>
    </section>

    <section class="row cards_">

        <div class="col-md-3 col-5 card_ vermelho_ ">
            <a href="itens.php" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Pizzas
                </h3>
            </a>
        </div>

        <div class="col-md-3 col-5 card_ vermelho_ ">
            <a href="" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Hamburgueres
                </h3>
            </a>
        </div>

        <div class="col-md-3 col-5 card_ rosa_">
            <a href="" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Lanches
                </h3>
            </a>

        </div>
        <div class="col-md-3 col-5 card_ verde_ ">
            <a href="" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Bebidas
                </h3>
            </a>
        </div>
        <div class="col-md-3 col-5 card_ azul_">
            <a href="" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Pizzas
                </h3>
            </a>
        </div>
        <div class="col-md-3 col-5 card_ vermelho_ ">
            <a href="" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Hamburgueres
                </h3>
            </a>
        </div>
        <div class="col-md-3 col-5 card_ rosa_">
            <a href="" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Lanches
                </h3>
            </a>
        </div>
        <div class="col-md-3 col-5 card_ verde_ ">
            <a href="" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Bebidas
                </h3>
            </a>
        </div>
        <div class="col-md-3 col-5 card_ verde_ ">
            <a href="" class="links_cards_">
                <h3 class="card-title_ sem-scroll">
                    Sobre mesas
                </h3>
            </a>
        </div>

    </section>
</main>

<footer class="rodape_">
        <div>
            <?php if ($endereco_sistema == "") { ?>
                <span class="esc"><?php echo $nome_sistema ?> / </span>
            <?php } else { ?>
                <span><?php echo $endereco_sistema ?></span>
            <?php } ?>


            <span>
                <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_sistema ?>" class="link_whats">
                    <i class="bi bi-whatsapp text-success"> <?php echo $telefone_sistema ?></i>
                </a>
            </span>
            /
            <span>
                <a target="_blank" href="<?php echo $instagram_sistema ?>" class="link_whats">
                    <i class="bi bi-instagram text-danger"> @Instagram</i>
                </a>
            </span>
        </div>
</footer>
</body>

</html>