
<?php if (isset($_SESSION['brand_error'])): ?>
    <div class='alert alert-danger'>

        <?php
        echo $_SESSION['brand_error'];
        unset($_SESSION['brand_error']);
        ?>

    </div>
<?php endif ?>


<?php if (isset($_SESSION['brand_success'])): ?>

    <div class="alert alert-success">
        <?php
        echo $_SESSION['brand_success'];
        unset($_SESSION['brand_success']);
        ?>

    </div>

<?php endif ?>



<?php if (isset($_SESSION['cat_error'])): ?>
    <div class='alert alert-danger'>

        <?php
        echo $_SESSION['cat_error'];
        unset($_SESSION['cat_error']);
        ?>

    </div>
<?php endif ?>


<?php if (isset($_SESSION['cat_success'])): ?>

    <div class="alert alert-success">
        <?php
        echo $_SESSION['cat_success'];
        unset($_SESSION['cat_success']);
        ?>

    </div>

<?php endif ?>

<!---->
<?php //if (isset($_SESSION['success'])): ?>
<!---->
<!--    <div class="alert alert-success">-->
<!--        --><?php
//        echo $_SESSION['success'];
//        unset($_SESSION['success']);
//        ?>
<!---->
<!--    </div>-->
<!---->
<?php //endif ?>
<!---->
<!---->
<!---->
<?php //if (isset($_SESSION['error'])): ?>
<!--    <div class='alert alert-danger'>-->
<!---->
<!--        --><?php
//        echo $_SESSION['error'];
//        unset($_SESSION['error']);
//        ?>
<!---->
<!--    </div>-->
<?php //endif ?>
