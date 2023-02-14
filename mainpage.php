<?php
require_once('./service/blog.php');
require_once('./service/dao.php');

$posts = getAllBlogPost();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo generateMetadataWith('Simple Blog') ?>
</head>
<body>
    <?php echo generateNavbar() ?>

    <div class="container">
        <section class="articles">
            <?php
            foreach($posts as $post):
            ?>

            <div class="article">
                <div class="article-image">
                    <img src="<?php echo $post['image'] ?>"/>
                </div>

                <div class="preview">
                    <h3><?php echo $post['title'] ?></h3>
                    <p><?php echo $post['date'] ?></p>
                    <p><?php echo $post['extract'] ?></p>
                    <a href="article?post=<?php echo $post['id_post'] ?>"><p>Seguir leyendo...</p></a>
                </div>
            </div>
            <?php endforeach; ?>
        </section>

    </div>
    
    <?php echo generateFooter() ?>
</body>
</html>