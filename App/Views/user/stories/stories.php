<div class="stories">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php foreach ($stories as $story) { ?>
                <div class="story">
                    <div class="story-heading">
                        <h1 class="head"><?php echo $story->story_title; ?></h1>
                    </div>
                    <div class="story-img">
                        <img class="img-fluid" src="<?php echo reach('upload/stories/' . $story->image); ?>">
                    </div>
                    <div class="story-info">
                        <h3><?php echo $story->story_name; ?></h3>
                        <p><?php echo $story->details; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-3">
                <div class="side-box">
                    <div class="heading">
                        <h4>Social Media</h4>
                    </div>
                    <div class="social">
                        <a href=""><i class="fab fa-facebook-f fa-fw"></i></a>
                        <a href=""><i class="fab fa-youtube fa-fw"></i></a>
                        <a href=""><i class="fab fa-twitter fa-fw"></i></a>
                        <a href=""><i class="fab fa-instagram fa-fw"></i></a>
                    </div>
                </div>
                <div class="side-box">
                    <div class="heading">
                        <h4>Categories</h4>
                    </div>
                    <div class="categories">
                        <?php foreach ($categories as $category) { ?>
                        <a href="<?php echo url('/category/' . strTrim($category->name) . '/' . $category->id); ?>">
                            <?php echo $category->name ?>
                        </a>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>