<div class="container">

	<div class="content_product">
		<ul>
			<?php foreach($data as $rec){ ?>
				<li>
					<img src="<?= BASE_URL.'uploads/product/'. $rec['product_image']; ?>">
					<p align="center">$<?= $rec['product_price']; ?></p>
					<p align="center"><?= $rec['product_name']; ?></p>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>