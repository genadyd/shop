import {byActiveFilter, byBrandFilter, byCategoryFilter} from "../Filters/byListElementFilter.js";
import {brandView} from "../../../Ship/Views/brandView.js";
import {categoryView} from "../../../Ship/Views/categoryView.js";
import {productView} from "../../../Ship/Views/productView.js";

export const productsListRender =(target:any)=>{
    const products = target.products
    const brandId = target.brand
    const categoryId = target.category
    let list = byCategoryFilter(products, categoryId)
        list = byBrandFilter(list, brandId)
        list = byActiveFilter(list)
    let productsListHtml = ``
    list.forEach((product:any)=>{
        productsListHtml+=productView(product)
    })
    const productsArea = document.querySelector('.content_container .products_area')!
    productsArea.innerHTML = productsListHtml
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


