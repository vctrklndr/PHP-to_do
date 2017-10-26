<?php
    require 'head.php';
    require 'database.php';
    require 'add.php';
    require 'delete.php';
    require 'complete.php';
    require 'fetch.php';
?>
    <header>
        <h1>I have so much stuffz to do!</h1>
    </header>
    <main>
        
        <div class="success_message">
            <?php
                if (isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                }
            ?>
        </div>
        
        <table>
            <tbody>
                <?php
                    foreach ($to_do as $to_do_list):
                        if ($to_do_list['completed'] == 0){ ?>
                <tr>
                    <td class="title"><?= $to_do_list['title']; ?></td>
                    <td class="author"><?= $to_do_list['createdBy']; ?></td>
                    <td>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="delete" value="<?= $to_do_list['id'] ?>" />
                            <input type= "submit" value="Ta bort" />
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="complete.php">
                            <input type="hidden" name="completed" value="<?= $to_do_list['id'] ?>" />
                            <input type= "submit" value="Färdig" />
                        </form>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
        <h2>Lägg till saker att göra:</h2>
        
        <form method="POST">
            <table>
                <tr>
                    <td class="entry">Att göra:</td>
                    <td><input type="text" name="title" required /></td>
                </tr>
                <tr>
                    <td class="entry">Skapad av:</td>
                    <td><input type="text" name="createdBy" required /></td>
                </tr>
            </table>
            <div class="button_container">
                <input type="submit" value="Lägg till" />
                <div class="reload">
                    <a href="index.php">Börja om</a>
                </div>
            </div><!-- button container -->
        </form>

        <h3>Redan gjort:</h3>
        <table>
            <tr>
            <?php
                foreach ($to_do as $to_do_list):
                    if ($to_do_list['completed'] == 1){ ?>
                <td class="title"><?= $to_do_list['title']; ?></td>
                <td class="author"><?= $to_do_list['createdBy']; ?></td>
                <td>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="delete" value="<?= $to_do_list['id'] ?>" />
                        <input type= "submit" value="Ta bort" />
                    </form>
                </td>     
            </tr>
            <?php } endforeach;  ?>
        </table>
    </main>

    <footer>
        <div class="footer">
            Username: vctrklndr<br />
            <a href="https://github.com/vctrklndr">https://github.com/vctrklndr</a>
        </div> 
    </footer>
</body>
</html>