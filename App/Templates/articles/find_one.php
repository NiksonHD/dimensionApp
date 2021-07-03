<?php /**@var \App\Data\ArticleDimensionsDTO $data */  ?>
<?php require_once __DIR__ . '../../header.php'; ?>
   <?php if($data && $data->getEan() !== null): ?>
<div style="color: blue">
     Артикул с EAN :  
    <?=$data->getEan(); ?>,</div>

    <div>Ширина = <?=$data->getWidth()?>,</div>
    <div>Дължина = <?=$data->getLength()?>,</div>
    <div>Височина = <?= $data->getHeight()?>,</div>
    <div>Тегло = <?= $data->getWeight()?>,</div>
    <div>въведен на: <?= $data->getUpdateDate()?></div>
<?php endif; ?>
<?php foreach ($errors as $error): ?>
            <p style="color: red"><?= $error ?></p>
        <?php endforeach; ?>
<form method="post" onload='consol.log(document.getElementById("ean").focus())' >
    <!--<button onclick="document.location = 'easy_list.php'" type="button">Направи списък</button>-->
    <table>
        <tr >
            <th  style="color:blue">Сканирай артикул</th>
            
        <td >
            <input style="width: 165px;" id="search_input" 
                   type="text" name="ean" value=""/></td>
        </tr>
        <tr>
            <td>
                <button id="button" style="background-color: #59b300" type="submit" name="find" value="1" >Търси</button>
            </td>
        </tr>

    </table>
</form>
    <div>
        

    </div>
</div>

</main>
</<body>






