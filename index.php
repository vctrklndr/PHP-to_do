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
        
        <h2>Stuff to do:</h2>

        <table>
            <tbody>
                <?php
                    foreach ($to_do as $to_do_list):
                        if ($to_do_list['completed'] == 0){ 
                ?>
                <tr>
                    <td class="title"><?= $to_do_list['title']; ?></td>
                    <td class="author"><?= $to_do_list['createdBy']; ?></td>
                    <td>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="delete" value="<?= $to_do_list['id'] ?>" />
                            <input type= "submit" value="Delete" />
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="complete.php">
                            <input type="hidden" name="completed" value="<?= $to_do_list['id'] ?>" />
                            <input type= "submit" value="Done" />
                        </form>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
        <div class="add_wrapper">
            <h2>Add to to-do list:</h2>
            
            <form method="POST">
                <table>
                    <tr>
                        <td class="entry">To do:</td>
                        <td><input type="text" name="title" required /></td>
                    </tr>
                    <tr>
                        <td class="entry">Author:</td>
                        <td><input type="text" name="createdBy" required /></td>
                    </tr>
                </table>
                <div class="button_container">
                    <input type="submit" value="Add" />
                    <div class="reload">
                        <a href="index.php">Refresh</a>
                    </div>
                </div><!-- button container -->
            </form>
        </div> <!-- add wrapper container -->

        <h2>Completed:</h2>
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
                        <input type= "submit" value="Delete" />
                    </form>
                </td>     
            </tr>
            <?php } endforeach;  ?>
        </table>
    </main>
<?php
    require 'footer.php';
?>