<link rel="stylesheet" href="/Modules/Admin/src/styles/products/product_form_module.css">
<h3 class="brands_heading">Brands</h3>
<div class="brands_component">
    <?php foreach($brands as $brand):?>
    <div class="brand_card  <?php if(isset($product_data) && $product_data['brand_id']===$brand['id']) echo 'selected' ?>" data-id="<?= $brand['id'] ?>">
        <div class="brand_logo">
            <img src="<?=$brand['brand_logo'] ?>" alt="<?=$brand['brand_name'] ?>">
        </div>
        <div class="brand_name_area">
            <span><?=$brand['brand_name'] ?></span>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<h3 class="category_heading">Categories</h3>
<div class="categories_component">
    <?php foreach($categories as $category):?>
        <div class="category_card <?php if(isset($product_data) && $product_data['category_id']===$category['id']) echo 'selected' ?>" data-id="<?= $category['id'] ?>">
            <div class="category_name">
                <h4><?=$category['category_name'] ?></h4>
            </div>
            <div class="category_description">
                <p><?=$category['category_description'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
