<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include "head.inc.php"; ?>
    <body>

        <?php include "nav.inc.php"; ?>


        <header class="jumbotron text-center">
            <h1 class="display-4">Welcome to World of Pets!</h1>
            <h2>Home of Singapore's Pet Lovers</h2>
        </header>
        <main class="container">
            <section id="dogs">
                <h2 class="header">All About Dogs!</h2>
                <div class="row">
                    <article class="col-sm">
                        <h3>Poodles</h3>
                        <figure class="figure">
                            <img class="img-thumbnail" src="images/poodle_small.jpg" alt="Poodle" title="View larger image..."/>    
                            <div class="div-thumbnail">
                            </div>
                            <figcaption class="caption">Standard Poodle</figcaption>
                        </figure>

                        <p >
                            Poodles are a group of formal dog breeds, the Standard
                            Poodle, Miniature Poodle and Toy Poodle...
                        </p>
                    </article>
                    <article class="col-sm">
                        <h3>Chihuahua</h3>
                        <figure class="figure">

                            <img class="img-thumbnail" src="images/chihuahua_small.jpg" alt="Chihuahua" title="View larger image..."/>        
                            <div class="div-thumbnail">
                            </div>
                            <figcaption class="caption">Chihuahua</figcaption>
                        </figure>

                        <p>
                            The Chihuahua is the smallest breed of dog, and is named
                            after the Mexican state of Chihuahua...
                        </p>
                    </article>
                </div>
            </section>
            <section id="cats">
                <h2 class="header">All About Cats!</h2>
                <div class="row">
                    <article class="col-sm">
                        <h3>Tabby</h3>
                        <figure class="figure">

                            <img class="img-thumbnail" src="images/tabby_small.jpg" alt="Tabby" title="View larger image..."/>
                            <div class="div-thumbnail">
                            </div>
                            <figcaption class="caption">Tabby</figcaption>
                        </figure>
                        <p>A tabby is any domestic cat (Felis catus) with a distinctive 'M' shaped marking on its forehead, stripes by its eyes and across its cheeks, along its back, and around its legs and tail</p>
                    </article>
                    <article class="col-sm">
                        <h3>Calico</h3>
                        <figure class="figure">

                            <img class="img-thumbnail" src="images/calico_small.jpg" alt="Calico" title="View larger image..."/>
                            <div class="div-thumbnail">
                            </div>
                            <figcaption class="caption">Calico</figcaption>
                        </figure>
                        <p>Calico cat is a domestic cat of any breed with a tri-color coat and is most commonly thought of as being typically 25% to 75% white with large orange and black patches (or sometimes cream and grey patches)                      </p>
                    </article>
                </div>
            </section>
        </main>
    </body>
    <?php include "footer.inc.php"; ?>
</html>
