
<?php $this->load->view('partials/header') ?>
<?php 
    if(empty($articles['cover'])){
        $cover = base_url('assets/assets/img/post-bg.jpg');
    } else {
        $cover = base_url('uploads/').$articles['cover'];
    
    }
?>
        <header class="masthead" style="background-image: url('<?php echo $cover; ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $articles['title']; ?></h1>
                            <span class="meta">
                                Posted by
                                <a href="#!">Start Bootstrap</a>
                                on August 24, 2023
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

                <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?php echo $articles['content']; ?>
                    </div>
                </div>
            </div>
        </article>


<?php $this->load->view('partials/footer') ?>