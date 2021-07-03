<?php /* * @var \App\Data\FiscalDTO $data */ ?>
<?php require_once __DIR__ . '../../header_bons.php'; ?>
<?php if (isset($data['bons']) && $data['bons']->getBonNumber() != null): ?>
    <div style="color: green">
        Записанa: Поръчка № 
        <?= $data['bons']->getBonNumber() ?>
    </div>
<?php endif; ?>
<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>
<div>
    <button onclick="document.location = 'insert_person.php'" type="button">Ново заглавие</button>
</div>
<form method="post" Onload='document.getElementById("bonNumber").focus()' >
    <table>
        <tr>
            <td>
                <select name="person_id">
                    <?php foreach ($data['persons'] as $person): ?>

                        <option  value="<?= $person->getId() ?>" <?= ($_SESSION['personId'] === $person->getId()) ? 'selected' : '' ?>><?= $person->getPersonName() ?></option>  
                    <?php endforeach; ?>


                </select>
            </td>
        </tr>

        <tr >
            <th  style="color:blue">Сканирай бон</th>

            <td >
                <input style="width: 125px;"id="bon_number" 
                       type="text" name="bon_number" value="" /></td>
        </tr>

        <tr>
            <td>
                <button id="button" style="background-color: #59b300" type="submit" name="edit" value="1" >Въведи</button>
            </td>
        </tr>

    </table>
</form>

<div>


</div>
</div>

</main>





