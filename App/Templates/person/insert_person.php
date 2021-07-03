<?php /* * @var \App\Data\FiscalDTO $data */ ?>
<?php require_once __DIR__ . '../../header_bons.php'; ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post"  >
    <table>
        

        <tr >
            <th  style="color:blue">Ново заглавие</th>

            <td >
                <input style="width: 125px;"id="bon_number" 
                       type="text" name="person_Name" value="" /></td>
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





