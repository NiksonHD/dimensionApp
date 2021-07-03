<?php /* * @var \App\Data\FiscalDTO $data */ ?>
<?php require_once __DIR__ . '../../header_bons.php'; ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post"  >
    <table>
        <?php foreach ($data['persons'] as $person): ?>


        <tr >

            <td >
                <input 
                    type="checkbox" name="id" value="<?=$person->getId() ?>" /><?=$person->getPersonName()?></td>
        </tr>
        <?php endforeach; ?>

        <tr>
            <td>
                <button id="button" style="background-color: red" type="submit" name="edit" value="1" >Изтрии!!!!</button>
            </td>
        </tr>

    </table>
</form>

<div>


</div>
</div>

</main>





