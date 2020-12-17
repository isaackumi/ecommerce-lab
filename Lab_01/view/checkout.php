<?php
// session_start();

require_once'./includes/header.php';

require_once '../controllers/cart_controller.php';

require_once '../controllers/Session.php';
//
//
if (!isset($_SESSION['user_id'])) {
  // code...
  header("Location: ../Login/login.php");
}



 ?>

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">check out</div>
						<div class="cart_items">
							<ul class="cart_list">

							</ul>
						</div>

						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">
									<?php
									$amt =getTotalItemAmountInCart();

									echo 'GH¢ ';
									echo $amt;

									?>

									<!-- GH¢ 500 -->
								</div>
							</div>
						</div>

						<div class="cart_buttons">
              <form class="" action="" id="pay" method="post">
                <input type="hidden" id="email" name="" value="<?= $email ?? "customer@gmail.com" ?>">
                <input type="hidden" id="amount" name="" value="<?= $amt ?? 30000?>">

                <input type="submit" class="btn btn-lg btn-info" name="" value="Checkout">

              </form>

							<!-- <button type="button" class="button cart_button_checkout">Add to Cart</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php include('./includes/footer.php') ?>
