<header class="header-navigation-hero" id="header">

    <!----------   FULL BAR ---------->


    <div id="fullMenu" class="full-menu menu fullMenu fullMenuOff">

        <div class="rightColumnMenu">
        
            <div class="headerFullMenuWrapper">
                <div class="logoWrapper">
                    <img class="logo-white" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_logo.svg">
                </div>

                <div class="taglineWrapper">
                    <img class="tagline-white" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_intro_devise.svg">

                </div>
            </div>
            <div class="contentFullMenuWrapper">
                <div class="socialsButtonsWrapper">
                    <img class="logo-ig logo-socials" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_rrss_ig.svg">
                    <img class="logo-in logo-socials" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_rrss_in.svg">

                </div>
                <div class="contactWrapper">
                    <p>04 72 74 80 80 <br>
                        contact[AT]lieuxfauves.com</p>
                </div>
                <div class="adressesWrapper">
                    <div class="parisAdressWrapper adressWrapper">
                        <p>PARIS<br>
                            22 rue des Taillandiers <br>
                            75011 Paris</p>

                    </div>
                    <div class="lyonAdressWrapper adressWrapper">
                        LYON<br>
                        43 rue des Hérideaux<br>
                        69008 Lyon
                    </div>
                    <div class="mayotteAdressWrapper adressWrapper">
                        MAYOTTE<br>
                        18 Chemin de la Convalescence<br>
                        97600 Mamoudzou
                    </div>
                </div>
            </div>


        </div>
        <div class="leftColumnMenu">
            <div class="leftColumnContent">




                <div class="menuItemFP">
                    <h1><a href="/agence">Agence</a></h1>
                    <div class="subMenuFP"><span class="barMenuFull">|</span><a href="/agence/#sec-valeur">Valeurs</a><span class="barMenuFull">|</span><a href="/agence/#sec-expertise">Expertise</a><span class="barMenuFull">|</span><a href="/agence/#sec-equipe">Équipe</a><span class="barMenuFull">|</span></div>

                </div>

                <div class="menuItemFP">
                    <h1><a href="/actualites">Actualités</a></h1>

                </div>

                <div class="menuItemFP">
                    <h1> <a href="/projets">Projets</a> </h1>
                    <div class="subMenuFP"><span class="barMenuFull"><span class="barMenuFull"><span class="barMenuFull"><span class="barMenuFull">|</span></span></span></span><a href="/projets">Lieux</a><span class="barMenuFull">|</span><a href="/projets">Architectures</a><span class="barMenuFull">|</span><a href="/projets">Urbanisme</a><span class="barMenuFull">|</span><a href="/projets">Vivant</a><span class="barMenuFull">|</span><a href="/projets">Éthique</a><span class="barMenuFull">|</span><a href="/projets">Soutenable</a><span class="barMenuFull">|</span></div>
                </div>

                <div class="menuItemFP">
                    <h1><a href="/explorations">Explorations</a> </h1>
                </div>






            </div>

        </div>
    </div>

    <!----------   SEARCH FORM MENU ---------->

    <div id="searchMenu" class="search-menu fullMenuOff">

        <div class="rightColumnMenuSearch">
            <div class="headerFullMenuWrapperSearch">
                <div class="logoWrapperSearch">
                    <div class="logoDeviseSearch">
                        <img class="logo-whiteSearch" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_footer_logo.svg">
                        <img class="tagline-search" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_devise_vert.svg">
                    </div>

                </div>
                <div id="search_result_ajax"></div>

                <div class="all_resultsCloned">
                <div id="all_results">
                    <div>actualites [<span>0</span>] </div>
                    <div>explorations [<span>0</span>] </div>
                    <div>projets [<span>0</span>] </div>
                    Tout [0]</div>

                    <div id="total_result">Résultats <span>[</span><span class="jungleNumber">0</span><span>]</span></div>

                </div>


            </div>



        </div>
        <div class="leftColumnMenuSearch">
            <div class="leftColumnContentSearch">

                <div class="searchForm">

                    <h1 class="titleSearch">Recherche</h1>


                    <form role="search" method="get" id="searchform" class="searchform" action="<?= home_url('/') ?>">
                        <div class="headerSearchGreen">
                            <input style="color= white" type="text" placeholder="Mot recherché" value="<?= get_search_query() ?>" name="s" id="s" />

                            <button type="submit" id="searchsubmit" class="glyphicon glyphicon-search"></button>
                        </div>
                    </form>


                    <div class="loupeFooterWrapper">

                        <div class="socialsButtonsWrapperLoupe">
                            <img class="logo-whiteSearch" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_mobile_logo-blanc.svg">
                    <img class=" logo-ig logo-socials" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_rrss_ig.svg">
                            <img class="logo-in logo-socials" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_rrss_in.svg">

                        </div>

                        <div class="contactWrapper">
                            <p>04 72 74 80 80 <br>
                                contact[AT]lieuxfauves.com</p>
                        </div>
                        <div class="adressesWrapper">
                            <div class="parisAdressWrapper adressWrapper">
                                <p><span class="loupeBold"> PARIS</span><br>
                                    22 rue des Taillandiers <br>
                                    75011 Paris</p>

                            </div>
                            <div class="lyonAdressWrapper adressWrapper">
                                <span class="loupeBold"> LYON</span><br>
                                43 rue des Hérideaux<br>
                                69008 Lyon
                            </div>
                            <div class="mayotteAdressWrapper adressWrapper">
                            <span class="loupeBold"> MAYOTTE</span><br>
                                18 Chemin de la Convalescence<br>
                                97600 Mamoudzou
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>

    <!----------   RESPONSIVE BAR ---------->
    <div class="responsive-menu">

        <a href="<?php echo home_url(); ?>" ?><img class="pictoResponsive logoResponsive" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_nav_logo.svg"></a>
        <a class="responsiveBurger" href="#" class><img class="pictoResponsive responsiveBurgerImg" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_nav_menu-burguer.svg"></a>
        <a> <img class="pictoNav loupeMobile" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_nav_loupe.svg"></a>
        <a class="pictoCloseSingleMobile" href="/actualites"> <img class="pictoNav pictoCloseActuMobile" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_trait_fermer_gris.svg"></a>




    </div>


    <!----------   SIDE BAR ---------->
    <div class="sidebar-menu">

        <navigation class=sidebarMenu>

            <div id="sideNavWrapper" class="sideNavWrapper">

                <div class="menuButtonWrapper">
                    <div class="burgerButton">
                        <a href="#" class="menuIcon burgerButton"><img class="pictoNav pictoBurguer" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_nav_menu-burguer.svg"></a>
                        <a href="#" class="closeIcon burgerButton"><img class="pictoNav pictoBurguer" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_burguer-fermer.svg"></a>
                    </div>

                    <a> <img class="pictoNav loupe" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_nav_loupe.svg"></a>
                    <a href="#header"> <img class="pictoNav flecheBas" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_nav_fleche-haut.svg"></a>
                    <a class="pictoLogo" href="<?php echo home_url(); ?>" ?><img class="pictoNav" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_nav_logo.svg"></a>
                    <a class="pictoCloseSingle" href="/actualites"> <img class="pictoNav pictoCloseActu" src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_trait_fermer_gris.svg"></a>


                    <?php
                    wp_nav_menu(array(
                        'menu_class' => 'sideNav',
                        'theme_location' => 'main-nav',
                        'container'      => 'false',

                    ));


                    ?>
                </div>

            </div>




    </div>
    </navigation>


</header>

<main class="main">