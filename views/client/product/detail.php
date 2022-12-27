<div class="container">
	<div class="product_detail">
		
		<div class="product_detail_left">
			<img class="product_detail_img" src="<?= BASE_URL.'uploads/product/'. @$data['product_image']; ?>">
		</div>
		
		<div class="product_detail_right p20">
			<h5><?= @$data['product_name']; ?></h5>
			<p><?= @$data['product_description']; ?></p>
			<h5 class="price"><?= @$data['product_price']; ?></h5>
			<button class="btn btn-primary" id="add_to_cart">Agregar Al Carrito</button>
		</div>

	</div>
</div>