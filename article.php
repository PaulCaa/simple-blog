<?php
require_once('./service/blog.php');
require_once('./service/dao.php');

$idPost = $_GET['post'];

$head = getHeadOfArticle($idPost);
while($e = mysqli_fetch_array($head)){
    $title = $e["title"];
    $image = $e["image"];
    $date = $e['date'];
    $author = $e["author"];
    $tags = $e["tags"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php echo generateMetadataWith('Simple Blog') ?>
</head>
<body>
<?php echo generateNavbar() ?>

    <div class="container">
        
        <article>

            <section class="head-article">
                <img src="<?php echo $image ?>">
                <div class="info">
                    <h1><?php echo $title ?></h1>
                    <p>Publicado <?php echo $date ?></p>
                    <p> Autor: <?php echo $author ?></p>
                </div>
            </section>

            <section class="content">
                <?php
                $content = getContentBy($idPost);
                while($row = mysqli_fetch_array($content)) {
                    if($row['tag'] == 'p') {
                        echo  "<p>" . $row["content"] . "</p>";
                    } else if($row['tag'] == 'h2') {
                        echo  "<h2>" . $row["content"] . "</h2>";
                    } else if($row['tag'] == 'img') {
                        echo  "<img src='" . $row["content"] . "'/>";
                    }
                }
                ?>
            </section>

            <section class="tags">
                <?php
                $tagsArray = explode(';',$tags);
                foreach ($tagsArray as $item):
                ?>
                <p><?php echo $item ?></p>
                <?php endforeach; ?>
            </section>

        </article>

    </div>
    
    <?php echo generateFooter() ?>
</body>
</html>