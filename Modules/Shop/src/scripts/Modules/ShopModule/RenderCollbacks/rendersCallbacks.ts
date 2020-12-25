import {byActiveFilter, byCategorieFilter} from "../Filters/byListElementFilter.js";
import {brandView} from "../../../Ship/Views/brandView.js";
import {categoryView} from "../../../Ship/Views/categoryView.js";

export const productsListRender =(target:any)=>{
    const products = target.products
    const brandId = target.brand
    const categoryId = target.category
    let list = byCategorieFilter(products, categoryId)
        list = byCategorieFilter(list, brandId)
        list = byActiveFilter(list)
    console.log(list)
}
export const brandsRenderCallback = (target:any)=>{
    let brandsListHtml = ``
        target.brands.forEach((brand:any)=>{
            brandsListHtml+=brandView(brand)
        })
    const brandsArea = document.querySelector('.content_container .brands_area')!
    brandsArea.innerHTML = brandsListHtml
}
export const categoriesRenderCallback = (target:any)=>{
    let categoriesListHtml = ``
    target.categories.forEach((cat:any)=>{
        categoriesListHtml+=categoryView(cat)
    })
    const categoriesArea = document.querySelector('.content_container .categories_area')!
    categoriesArea.innerHTML = categoriesListHtml
}
