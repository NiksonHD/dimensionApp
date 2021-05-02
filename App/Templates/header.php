<!DOCTYPE html>  
<?php $cell = ['tileAdress' => '', 'tileNumber' => '', 'multipleSearch' => '', 'comment' => '', 'lists' => '0', 'deliveries' => '0'];
?>
<?php /** @var \App\Data\TileDTO $data[] */ ?>
<?php /** @var array $errors |null */ ?>

<html >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title> Артикулни размери</title>

        <link rel="stylesheet" type="text/css" href="App/Templates/styles/style.css">
    </head>
    <?php /** @var \App\Data\MyItemDTO[] $data */ ?>

    <header id="navbar">
        <nav>
            
            
            
            <a href="menu_page.php">Home</a>
            <!--<a href="findTiles.php">ТЪРСЕНЕ</a>-->
            <a href="edit_article_dimensions.php">Въвеждане размери</a>
            <!--<a href="export_data.php">Export</a>-->
            <!--<a href="tile/edit">CHG</a>-->
            <!--<a href="edit.php">CHG</a>-->
            <!--<a href="profile.php">[]</a>-->
            <!--<a href="logout.php">Logout</a>-->

        </nav>
    </header>
    <body id="bodyStyle">
        <main>