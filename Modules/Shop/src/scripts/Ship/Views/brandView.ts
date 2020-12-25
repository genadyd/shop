export const brandView = (brand: any) => {
    return `<div class="one_brand" data-id="${brand.id}">
              <div class="brand_title_area">${brand.brand_name}</div>
           </div>`
}
