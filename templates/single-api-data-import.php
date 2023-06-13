<?php 

get_header(); ?>
<div id="pageContent">
    <main class="api-fetch-store">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section>
                        <?php the_title('<h1 class="api-fetch-store__heading">', '</h1>'); ?>
                        <?php the_content(); ?>
                    </section>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>