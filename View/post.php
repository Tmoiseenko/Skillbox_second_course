<?php require_once VIEW_DIR . '/layout/header.php'; ?>
<?php require_once VIEW_DIR . '/layout/front_menu.php'; ?>
<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url('<?= $post->image ?>');" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="category.html">Lifestyle</a>
                </div>
                <h1>Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</h1>
                <ul class="post-meta">
                    <li><a href="/profile/<?= $post->user->login ?>"><?= $post->user->fio ?></a></li>
                    <li><?= $post->created_at->toFormattedDateString() ?></li>
                    <li><i class="fa fa-comments"></i> <?= $comment_count ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->
</header>
<!-- /HEADER -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">

                <!-- post content -->
                <?= htmlspecialchars_decode($post->content) ?>
                <!-- /post content -->

                <!-- post comments -->
                <div class="section-row mt-5">
                    <div class="section-title">
                        <h3 class="title"><?= $comment_count ?> комментария</h3>
                    </div>
                    <div class="post-comments">
                        <?php foreach($comments as $comment):
                            $img_url = HOME_URL . '/public/uploaded/avatar.jpg';
                            if($comment->user->avatar){
                                $img_url = HOME_URL . $comment->user->avatar;
                            }
                            ?>
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="<?= $img_url ?>" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4><?= $comment->user->fio ?></h4>
                                    <span class="time"><?= $comment->created_at ?></span>
                                </div>
                                <p><?= $comment->text ?></p>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                <div class="section-row">
                    <div class="section-title">
                        <h3 class="title">Оставте коментарий</h3>
                    </div>
                    <form action="/comment/<?= $post->id ?>" method="post" class="post-reply">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="input" name="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="primary-button" value="Отправить">
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /post reply -->
                </div>
            </div>


            <?php require_once VIEW_DIR . '/sidebar.php'; ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<?php require_once VIEW_DIR . '/layout/footer.php'; ?>
