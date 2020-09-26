<?php
ob_start();
session_start();
require ('../controllers/productcontroller.php');


if (isset($_POST['add_brand'])){

    $brand_name = $_POST['brand_name'];
    $add = addBrand($brand_name);
    if ($add){

        $_SESSION['brand_success'] = 'Successfully added to brand';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['brand_error'] = 'Error adding to brand';
        header('Location: ../admin/index.php');
    }
}



if (isset($_POST['update_brand'])){

    $brand_name = $_POST['brand_name'];
    $brand_id = $_POST['brand_id'];
    $add = updateBrand($brand_name,$brand_id);
    if ($add){

        $_SESSION['brand_success'] = 'Successfully Updated ';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['brand_error'] = 'Error updating brand';
        header('Location: ../admin/index.php');
    }
}



if (isset($_GET['delete_brand_id'])){

//    echo 'working';

    $brand_id = $_GET['delete_brand_id'];
    $add = deleteBrand($brand_id);
    if ($add){

        $_SESSION['brand_success'] = 'Brand deleted successfully ';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['brand_error'] = 'Error deleting brand';
        header('Location: ../admin/index.php');
    }
}



if (isset($_POST['add_category'])) {

    $cat_name = $_POST['cat_name'];
    echo $cat_name;
    $add = addCategory($cat_name);
    if ($add){

        $_SESSION['cat_success'] = 'Successfully added to category';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['cat_error'] = 'Error adding to category';
        header('Location: ../admin/index.php');
    }
}

if (isset($_GET['delete_category_id'])){

//    echo 'working';

    $cat_id = $_GET['delete_category_id'];
    $add = deleteCategory($cat_id);
    if ($add){

        $_SESSION['success'] = 'Category deleted successfully ';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['error'] = 'Error deleting category';
        header('Location: ../admin/index.php');
    }
}

if (isset($_POST['update_category'])){


    $cat_name = $_POST['cat_name'];
    $cat_id = $_POST['cat_id'];

//    echo $cat_name;
//    echo $cat_id;


    $add = updateCategory($cat_name,$cat_id);

    if ($add){

        $_SESSION['success'] = 'Successfully Updated ';
        header('Location: ../admin/index.php');

    }else{
        $_SESSION['error'] = 'Error updating brand';
        header('Location: ../admin/index.php');
    }
}


if (isset($_POST['upload_prod'])){

    echo "we dey give you";

}



