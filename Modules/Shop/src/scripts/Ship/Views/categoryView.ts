export const categoryView = (category: any) => {
    return `<div class="one_category" data-id="${category.id}">
              <div class="category_title_area">${category.category_name}</div>
           </div>`
}
