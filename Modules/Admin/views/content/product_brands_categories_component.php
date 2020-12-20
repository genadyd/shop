<link rel="stylesheet" href="/Modules/Admin/src/styles/products/product_form_module.css">
<h4 class="brands_headding">Brands</h4>
<div class="brands_component">

    <?php foreach($brands as $brand):?>
    <div class="brand_card" data-id="<?= $brand['id'] ?>">
        <div class="brand_logo">
            <img src="<?=$brand['brand_logo'] ?>" alt="<?=$brand['brand_name'] ?>">
        </div>
        <div class="brand_name_area">
            <span><?=$brand['brand_name'] ?></span>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="categories_component">
    <?php foreach($categories as $category):?>
        <div class="brand_card" data-id="<?= $category['id'] ?>">
            <div class="category_name">
                <span><?=$category['category_name'] ?></span>
            </div>
            <div class="category_description">
                <p><?=$category['category_description'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
