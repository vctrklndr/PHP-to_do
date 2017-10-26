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
        <h2>Att göra:</h2>
        <?php
            foreach ($to_do as $to_do_list):
                if ($to_do_list['completed'] == 0){ ?>
        <div class="list_wrapper">
            <div class="list_container">
                <div class="list_title"><?= $to_do_list['title']; ?></div>
                <div class="list"><?= $to_do_list['createdBy']; ?></div>
                <div class="list">
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="delete" value="<?= $to_do_list['id'] ?>" />
                        <input type= "submit" value="Ta bort" />
                    </form>
                </div>
                <div class="list">
                    <form method="POST" action="complete.php">
                        <input type="hidden" name="completed" value="<?= $to_do_list['id'] ?>" />
                        <input type= "submit" value="Färdig" />
                    </form>
                </div>
            </div><!-- list container -->
        </div><!-- list wrapper -->
        <?php } endforeach; ?>
    </main>
</body>
</html>