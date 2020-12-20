<div class="add_component_button_area">
    <div class="add_button">
        <a href="/admin/products/add"> <span class="material-icons">add</span> </a>
    </div>
</div>
<div class="products_list items_list">
    <div class="items_table_header">
        <div class="img_head">img</div>
        <div class="name_head">name</div>
        <div class="desc_head">deck</div>
        <div class="price_head">price</div>
        <div class="quant_head">quantity</div>
        <div class="controls">#</div>
    </div>
    <?php foreach($products as $product):?>
        <div class="one_product one_item" data-id="<?=$product['id']?>">
            <div class="image_area">
                <img src="<?= $product['product_image']?>" alt="<?=$product['product_name'] ?>">
            </div>
            <div class="name_area"><?=$product['product_name'] ?></div>
            <div class="description_area"><?=$product['product_description'] ?></div>
            <div class="price_area"><?=$product['price'] ?></div>
            <div class="quantity_area"><?=$product['quantity'] ?></div>
            <div class="controls_area">
                <a href="/admin/products/edit/<?=$product['id']?>">
                    <span class="material-icons">create</span>
                </a>
                <a class="delete_button" href="/admin/products/delete/<?=$product['id']?>">
                    <span class="material-icons">delete</span>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
