export const productView = (product: any) => {
    return `<div class="one_product" data-id="${product.id}">
              <div class="product_title_area">${product.product_name}</div>
              <div class="product_image_area">
                 <img src="${product.product_image}" alt="${product.product_name}" class="product_image">
              </div>
              <div class="product_description_area">
                 <p>${product.product_description}</p>
              </div>
              <div class="product_info_area">
                 <div class="price">
                     <span>Price:</span>
                     <span>${product.price}</span>
                     <span>$</span>
                 </div>
                 <div class="quantity"><span>In stock:</span>${product.quantity}</div>
              </div>
              <div class="product_buttons_area">
                 <div class="send_to_card_button">Add to card</div>
                 <input type="number" class="card_product_quantity">
                 <div class="acc_sum">${product.price}<span>$</span></div>
              </div>
           </div>`
}
