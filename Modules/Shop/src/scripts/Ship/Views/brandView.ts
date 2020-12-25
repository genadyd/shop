export const brandView = (brand: any) => {
    return `<div class="one_brand" >
<div class="brand_title_area">${brand.brand_name}</div>
<div class="brand_image_area">
<img src="${brand.brand_logo}" alt="${brand.brand_name}" class="b_image">
</div>
</div>`
}
