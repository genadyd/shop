<div class="add_component_button_area">
    <div class="add_button">
        <a href="/admin/brands/add"> <span class="material-icons">add</span> </a>
    </div>
</div>
<div class="brands_list items_list">
    <?php foreach($brands as $brand):?>
    <div class="one_brand one_item" data-id="<?=$brand['id']?>">
        <div class="image_area">
            <img src="<?= $brand['brand_logo']?>" alt="<?=$brand['brand_name'] ?>">
        </div>
        <div class="name_area"><?=$brand['brand_name'] ?></div>
        <div class="controls_area">
            <a href="/admin/brands/edit/<?=$brand['id']?>">
                <span class="material-icons">create</span>
            </a>
            <a class="delete_button" href="/admin/brands/delete/<?=$brand['id']?>">
                <span class="material-icons">delete</span>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
