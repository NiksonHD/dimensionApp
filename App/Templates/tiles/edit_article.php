<?php require_once 'header.php';?>

<div>
    <?php foreach ($errors as $error):?>
    <p style="font-size: 20px; color: red"> <?= $error?></p>
    <?php endforeach;?>
    
</div>
<div style="font-size: 15px; color: red">Смяна клетка меню'ПРОМЕНИ'</div>
<p></p>
<div style="font-size: 20px; color: red">CHG клетка: <?= ($data)?$data[0]->getCellFromInput() : ''?> </div>
<div style="font-size: 22px; color: darkblue">В момента:
            <?php if($data):?>
<?php foreach ($data as $article): ?>
    <p>
    <?=  $article->getSapNum();?>
    <?=  $article->getArticleName();?>
    </p>
    <?php endforeach; ?>
        <?php endif;?>

</div>

<form method="post">
    <table>
        
        <tr>
            <th>Въведи номер:</th>
            <td><input type="text" name="article" value="<?= $cell['tileNumber'] ?>" autofocus/></td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <button style="background-color: #59b300" type="submit" name="edit_article" value="1">Запази</button>
            </td>
        </tr>
    </table>


</form>


        </div>
