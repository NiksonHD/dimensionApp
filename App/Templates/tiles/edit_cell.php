<?php require_once 'header.php'; ?>

<div style="font-size: 25px; color: blue ">ПРОМЕНИ ПЛОЧКИ</div>
<div style="font-size: 22px; color: green ">
    <?php if ($data): ?>
        <?php foreach ($data as $article)
             ?>
        <p>Артикул <?= $article->getSapNum() ?> <?= $article->getArticleName() ?> записан в # <?= $article->getCellFromInput() ?></p> 
        <p></p> 

<?php endif; ?>

</div>
<?php if ($errors): ?>

    <?php foreach ($errors as $error): ?>
        <p style="font-size: 20px; color: red"> <?= $error ?></p>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" Onload='document.getElementById("tileNumber").focus()'>
    <table>

        <tr>
            <th>Сканирай клетка:</th>
            <td><input type="text" name="cell" value="<?= $cell['tileNumber'] ?>" autofocus /></td>
        </tr>


        <tr>
            <td></td>
            <td>
                <button style="background-color: #59b300" type="submit" name="edit_cell" value="1">Напред</button>
            </td>
        </tr>
    </table>


</form>
</main>
</body>

