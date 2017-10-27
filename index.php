<?php
    session_start();
    require 'head.php';
    require 'database.php';
    require 'add.php';
    require 'delete.php';
    require 'complete.php';
    require 'fetch.php';
?>

    <header>
        <h1>Add to to-do list:</h1>
    </header>
    <main>
        <!-- Add new to-dos: -->
        <form method="POST">
            <div class="add_wrapper">
                <div class="entry">To do:</div>
                <div class="entry">
                    <input type="text" name="title" required />
                </div>
                <div class="entry">Author:</div>
                <div class="entry">
                    <input type="text" name="createdBy" required />
                </div>
            </div> <!-- add wrapper container -->
        
            <div class="button_container">
                <input type="submit" value="Add" />
                <div class="reload">
                    <a href="index.php"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>
            </div><!-- button container --> 
        </form>

        <!-- Success message while new post -->
        <div class="success_message">
            <?php
                if (isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                }
            ?>
        </div>
        
        <!-- Stuff to do: -->
        <h2>Stuff to do:</h2>
        <div class="to_do_wrapper">
            <?php
                foreach ($to_do as $to_do_list):
                    if ($to_do_list['completed'] == 0){ 
            ?>
            <div class="to_do_container">
                <div class="title"><?= $to_do_list['title']; ?></div>
                <div class="author"><?= $to_do_list['createdBy']; ?></div>
                    <div>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="delete" value="<?= $to_do_list['id'] ?>" />
                            <button type= "submit" value="Delete">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                    <div>
                        <form method="POST" action="complete.php">
                            <input type="hidden" name="completed" value="<?= $to_do_list['id'] ?>" />
                            <button type= "submit" value="Done">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div><!-- to do container -->
            <?php } endforeach; ?>
        </div><!-- to do wrapper -->

        <!-- Completed to-dos: -->
        <h2>Completed:</h2>
        
        <div class="complete_wrapper">
        <?php
            foreach ($to_do as $to_do_list):
                if ($to_do_list['completed'] == 1){ ?>
            <div class="complete_container">
                <div class="title"><?= $to_do_list['title']; ?></div>
                <div class="author"><?= $to_do_list['createdBy']; ?></div>
                <div>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="delete" value="<?= $to_do_list['id'] ?>" />
                        <button type= "submit" value="Delete">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div><!-- complete container -->
            <?php } endforeach;  ?>
        </div><!-- complete wrapper -->
    </main>

<?php
    require 'footer.php';
    session_destroy();
?>