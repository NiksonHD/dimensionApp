<?php /* * @var \App\Data\FiscalDTO $data */ ?>
<?php require_once __DIR__ . '../../header_bons.php'; ?>

<?php foreach ($errors as $error): ?>
<p style="color: red"><?= $error ?></p>
<?php endforeach; ?>
<form method="post" Onload='document.getElementById("tileNumber").focus()' >
    <!--<button onclick="document.location = 'easy_list.php'" type="button">Направи списък</button>-->
    <table>
        <tr >
            <th  style="color:blue">Избери дата</th>

            <td >
                <input style="width: 165px;" id="search_input" 
                       type="date" name="date" value=""/></td>
        </tr>
        <tr>
            <td>
                <select name="person">
                    <?php foreach ($data['persons'] as $person): ?>
                    <option value="<?=$person->getId()?>" <?=($_SESSION['personId'] === $person->getId())?'selected':''?>><?=$person->getPersonName()?></option>  
                    <?php endforeach; ?>

                    
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button id="button" style="background-color: #59b300" type="submit" name="show" value="1" >Давай</button>
            </td>
        </tr>

    </table>

    <div>
        
        <?php if (isset($data['bons'])): ?>
        <?php foreach ($data['bons'] as $bon): ?>
        <div>
            <span><?= $bon->getBonNumber() ?></span>
            <span><?= $bon->getUpdateDate() ?></span>
            <span><?= $bon->getPerson() ?></span>
        </div>
        <hr>

        <?php endforeach; ?> 
        <?php endif; ?> 
        

    </div>
</div>

</main>





