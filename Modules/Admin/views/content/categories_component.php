<div class="add_component_button_area">
    <div class="add_button">
        <a href="/admin/categories/add"> <span class="material-icons">add</span> </a>
    </div>
</div>
<div class="categories_list items_list">
    <?php foreach($categories as $category):?>
        <div class="one_category one_item" data-id="<?=$category['id']?>">

            <div class="name_area"><?=$category['category_name'] ?></div>
            <div class="description_area"><?=$category['category_description'] ?></div>
            <div class="controls_area">
                <a href="/admin/categories/edit/<?=$category['id']?>">
                    <span class="material-icons">create</span>
                </a>
                <a class="delete_button" href="/admin/categories/delete/<?=$category['id']?>">
                    <span class="material-icons">delete</span>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
