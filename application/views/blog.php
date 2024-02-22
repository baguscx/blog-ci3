<?php $this->load->view('partials/header') ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Bagus Blog</h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <form action="">
                        <input type="text" name="find">
                        <input type="submit" value="Find" class="btn btn-sm rounded btn-primary text-uppercase">
                    </form>
                    <?php foreach ($articles as $key => $article): ?>
                        <div class="post-preview">
                            <a href="<?php echo site_url('blog/detail/') . $article['url']?>">
                                <h2 class="post-title"><?php echo $article['title'] ?></h2>
                            </a>
                            <p>
                                <a href="<?php echo site_url('blog/edit/') . $article['id'] ?>">Edit</a>
                                <a href="<?php echo site_url('blog/delete/') . $article['id'] ?>">Delete</a>
                            </p>
                            <p class="post-meta">
                                Posted by
                                <a href="#!">Start Bootstrap</a>
                                on September 24, 2023
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    <?php endforeach; ?>

                    <?php echo $this->pagination->create_links(); ?>

                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
<?php $this->load->view('partials/footer') ?>