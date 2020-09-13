<?php
//database connection is done in cartclass (this is done to avoid duplicate)
require("../settings/db_class.php");
/**
 *Product class to handle everything product related
 */
/**
 *@author David Sampah
 */
class product_class extends db_connection
{
    /**
     *method to insert new product
     *takes the title and price
     */
    public function add_new_product($a, $b, $c,$d, $e,$f,$g){

        //Write the insert sql
        $sql = "INSERT INTO products (`product_title`,`product_price`,`product_desc`, `category`,`img1`,`img2`,`img3`) VALUES('$a', '$b','$c', '$d','$e', '$f','$g')";
        //execute the sql and return boolean
        return $this->db_query($sql);
    }

    /**
     *method to view all products
     */
    public function view_products($category){
        //a query to get all products
        $sql = "SELECT * FROM products where category='$category'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }


    public function recommended(){
        //a query to get all products
        $sql = "SELECT TOP 4 * FROM products";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    public function insert_image($a){

        //Write the insert sql
        $sql = "INSERT INTO images (`image`) VALUES('$a')";
        //execute the sql and return boolean
        return $this->db_query($sql);
    }

    public function view_all_images(){
        //a query to get all products
        $sql = "SELECT * FROM images";

        //execute the query and return boolean
        return $this->db_query($sql);
    }


    public function view_order_details($pid,$status){
        //a query to get all products
        $sql = "SELECT * FROM orders where customer_id='$pid' and order_status='$status'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }
    public function view_all_products(){
        //a query to get all products
        $sql = "SELECT * FROM products";

        //execute the query and return boolean
        return $this->db_query($sql);
    }
    /**
     *method to view one product base on id
     *takes product id
     */
    public function view_one_product($pa){
        //a query to get one product base on id
        $sql = "SELECT * FROM products WHERE product_id=$pa";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    /**
     *method to search product
     *takes the search term
     */
    public function search_a_product($sterm){
        //a query to search product matching term
        $sql = "SELECT * FROM products WHERE product_title LIKE '%$sterm%'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    /**
     *method to update a product
     *takes the id, title and price
     */
    public function update_one_product($a, $b, $c){
        //a query to update a product
        $sql = "UPDATE products SET `product_title`='$b', `product_price`='$c' WHERE product_id=$a";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    /**
     *method to delete a product using an id
     *takes the id
     */
    public function delete_one_product($a){
        //a query to delete product using an id
        $sql = "DELETE from products WHERE product_id=$a";

        //execute the query and return boolean
        return $this->db_query($sql);
    }



    ////

    public function add_to_cart($a, $b){


        $sql = "INSERT INTO cart (`product_id`,`customer_id`,`qty`) VALUES('$a', '$b', '1')";

        //execute the sql and return boolean
        return $this->db_query($sql);
    }


    public function view_cart_item($a){
        //a query to get cart items
        $sql = "SELECT * FROM cart WHERE customer_id='$a'";
        //execute the query and return boolean
        return $this->db_query($sql);
    }

    public function qty($a){
        //a query to get cart items
        $sql = "SELECT qty FROM products WHERE product_id='$a'";
        //execute the query and return boolean
        return $this->db_query($sql);
    }

    public function update_cart_quantity($a, $b, $c){
        //a query to update a cart quantity
        $sql = "UPDATE cart SET `qty`='$c' WHERE product_id='$a' AND customer_id='$b'";


        return $this->db_query($sql);
    }





    public function check_cart_duplicate($a, $b){
        //a query to get cart items base the two id
        $sql = "SELECT * FROM cart WHERE product_id='$a' AND customer_id='$b'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }


    /////

    public function insert_order($id, $pid,$email, $number, $address,$town,$qty){
        // *generate a random number using rand() php function.
        $random=rand();
        //get todays date(use the date('Y-m-d')
        $date=date('Y-m-d');
        //set the order status to 'paid'
        $status="paid";
        $sql="INSERT into orders(`order_id`,`customer_id`,`pid`,`email`,`contact`,`address`, `town`,`qty`, `invoice_no`,	`order_date`,`order_status`) VALUES('', '$id', '$pid','$email', '$number', '$address', '$town','$qty','$random','$date', '$status')";
        return $this->db_query($sql);
    }


    /**
     *method to insert new order detail
     *takes order id, product id, customer id and quantity
     */

    //add to order details table code goes here

    public function insert_order_details($order_id, $product_id, $customer_id, $qty){

        $sql="INSERT into orderdetails(`order_id`,`product_id`,`cus_id`,`qty`) VALUES('$order_id', '$product_id', '$customer_id', '$qty')";
        return $this->db_query($sql);

    }





    /**
     *method to insert new payment
     *takes amount, customer id and order id
     */

    //insert payment method goes here
    public function insert_payment($amount, $customer_id, $order_id){
        $date=date('Y-m-d');
        $sql="INSERT into payment(`pay_id`,	`amt`,	`customer_id`,	`order_id`,	`currency`,	`payment_date`) VALUES('', '$amount', '$customer_id', '$order_id', 'cedis', '$date')";
        return $this->db_query($sql);

    }


    public function view_product_name($a){
        //a query to delete product using an id
        $sql = "SELECT product_title from products WHERE product_id='$a'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    public function delete_all_cart_item($a){
        //a query to delete all cart item base on id
        $sql = "DELETE from cart WHERE customer_id='$a'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    public function delete_cart_item($a, $b){
        //a query to delete a cart item base on both id
        $sql = "DELETE from cart WHERE product_id=$a AND customer_id='$b'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }
    public function update_status($a,$b){
        //a query to delete all cart item base on id
        $sql = "UPDATE orders SET `order_status`='$a' where customer_id='$b'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }
}
?>