<?php /**@var \App\Data\ArticleDimensionsDTO $data */  ?>
<?php require_once __DIR__ . '../../header.php'; ?>
   <?php if($data && $data->getEan() !== null): ?>
<div style="color: red">
    Изтрит: Артикул с EAN :  
    <?=$data->getEan(); ?>
    и размери: 
    (Ш=<?=$data->getWidth()?>, Д=<?=$data->getLength()?>, В=<?= $data->getHeight()?>, Т=<?= $data->getWeight()?>)
</div>
<?php endif; ?>
<?php foreach ($errors as $error): ?>
            <p style="color: red"><?= $error ?></p>
        <?php endforeach; ?>
<form method="post" Onload='document.getElementById("tileNumber").focus()' >
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
                <button id="button" style="background-color: #59b300" type="submit" name="delete" value="1" >Изтрии</button>
            </td>
        </tr>

    </table>

    <div>
        

    </div>
</div>

</main>





