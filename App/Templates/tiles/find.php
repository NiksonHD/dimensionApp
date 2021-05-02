<?php require_once __DIR__ .'../../header.php';?>


            <form method="post" Onload='document.getElementById("tileNumber").focus()' >
                <button onclick="document.location = 'easy_list.php'" type="button">Направи списък</button>
                <table>
                    <tr>
                    <span id="hidden" style="color: red"></span>
                    <th>Списък</th>
                    <input type="hidden" name="lists" value="<?= $cell['lists'] ?>"/>
                    <td><input style="height: 20px; width: 20px" type="checkbox" name="lists" value="1" title="Маркирай тук ако искаш да запазиш търсенето, като лист"/></td>
                    </tr>
<!--                    <tr>
                        <th>Клиентски поръчки</th>
                    <input type="hidden" name="lists" value="<?= $cell['deliveries'] ?>"/>
                    <td><input style="height: 20px; width: 20px" type="checkbox" name="deliveries" value="1" title="Маркирай тук за търсене в поръчки и транспорти"/></td>
                    </tr>-->
                    <tr >
                        <th  style="color:blue">ТЪРСЕНЕ ПЛОЧКИ</th>
                        <?php foreach ($errors as $error): ?>
                                <p style="color: red"><?= $error ?></p>
                            <?php endforeach; ?>
                        <td >
                            


                            <input id="search_input" title=" Примери за списъци:
                                   494001.3.494002.12;
                                   494001.494002.494003" type="text" name="tileNumber" value="<?php echo $cell['tileNumber'] ?>" autofocus/></td>

                    </tr>

                    <tr>
                        <th>Коментар:</th>
                        <td>
                            <div>
                                <input id="search_input" title="Добавянето на име към коментара помага на склада!" type="text" name="comment" value="<?= $cell['comment'] ?>"/><br>
                            </div>
                        </td>
                        <td>
                            <button id="button" style="background-color: #59b300" type="submit" name="search" value="1" >ТЪРСИ</button>
                        </td>
                    </tr>
                </table>

                <div>
                    <?php if ($data): ?>
                        <?php foreach ($data as $tile): ?>
                            <p> Артикул: <span><a target='_blank' href='http://praktiker.bg/search/?q=<?= $tile->getSapNum() ?>'><?= $tile->getSapNum() ?></a></span>
                                <span><?= $tile->getArticleName() ?></span>,
                            </p>  
                            <p>EAN: <?= $tile->getEan() ?>,</p>  
                            <p title="Наличност към: <?= $tile->getUpdateDate() ?>">наличност: <?= $tile->getQuantity() ?> бр. към: <?= $tile->getUpdateDate() ?> ,</p>  
                            <p>клетки: <?php foreach ($tile->getCells() as $cell): ?>  
                                    <a href="edit_article.php?cell=<?= $cell->getAdress() ?>" title="Последна промяна на клетката: <?= $cell->getUpdateDate() ?>"> #(<?= $cell->getAdress() ?>) </a>
                                <?php endforeach; ?>

                            </p>
                            <a href="edit.php?article=<?= $tile->getSapNum() ?>">ЗАПИШИ В</a>

                            <hr><br>

                        <?php endforeach; ?>
                    <?php endif; ?>


                </div>
                </div>

    </main>





