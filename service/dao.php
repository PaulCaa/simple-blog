<?php


  function openConnection(){
    $db = new mysqli('host', 'user', 'pwd', 'database');
    return $db;
  }
  
  /* Metodo para listar todos los articulos de la base */
  function getAllBlogPost(){
    $con = openConnection();
    $con->query("SET NAMES 'utf8'");
    $result = $con->query("SELECT
        post.id_post,
        post.title,
        post.date,
        aut.name_author AS author,
        post.extract,
        post.image
    FROM blog_posts AS post, blog_categories AS cat, blog_authors AS aut
    WHERE cat.id_category = post.id_category
    AND aut.id_author = post.id_author
    ORDER BY post.id_post DESC;");
    mysqli_close($con);
    return $result;
  }
  
  /* Metodo para obtener el contenido de la portada de un articulo */
  function getHeadOfArticle($idPost){
    $con = openConnection();
    $con->query("SET NAMES 'utf8'");
    $result = $con->query("SELECT
        post.title,
        post.image,
        post.date,
        aut.name_author AS author,
        post.tags
      FROM blog_posts post
      JOIN blog_categories cat ON post.id_category = cat.id_category
      JOIN blog_authors aut ON post.id_author = aut.id_author
      WHERE post.id_post = ".$idPost.";");
      mysqli_close($con);
      return $result;
  }
  
  /* Metodo para obtener todo el contenido asociado a un articulo  */
  function getContentBy($idPost){
    $con = openConnection();
    $con->query("SET NAMES 'utf8'");
    $result = $con->query("SELECT
        content,
        tag
    FROM blog_post_content
    WHERE idPost = " . $idPost . "
    ORDER BY idPost DESC;");
    mysqli_close($con);
    return $result;
  }
  
?>