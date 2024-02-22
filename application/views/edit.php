<?php $this->load->view('partials/header'); ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Edit Article</h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row justify-content-center">
                <div>
                    <?php echo validation_errors(); ?>
                </div>
                <div class="col-md-8">
                            <?php echo form_open_multipart(); ?>
                                <div class="form-group">       
                                        <label for="title">Title</label>
                                        <?php echo form_input('title', set_value('title', $articles['title']), 'class="form-control" id="title"'); ?>
                                    </div>
                                    <div class="form-group">       
                                        <label for="url">url</label>
                                        <?php echo form_input('url', set_value('url', $articles['url']), 'class="form-control" id="url"'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <?php echo form_textarea('content', set_value('content', $articles['content']), 'class="form-control" id="content" cols="30" rows="10"'); ?>
                                    </div>
                                    <div class="form-group">       
                                        <label for="cover">cover</label>
                                        <?php echo form_upload('cover', set_value('cover', $articles['cover']), 'class="form-control" id="cover"'); ?>
                                    </div>
                                        <button class="btn btn-primary" type="submit">Save Article</button>
                        </form>
<?php $this->load->view('partials/footer');?>