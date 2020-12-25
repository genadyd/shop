import {byActiveFilter, byCategorieFilter} from "../Filters/byListElementFilter.js";
import {brandView} from "../../../Ship/Views/brandView.js";

export const productsListRender =(target:any)=>{
    const products = target.products
    const brandId = target.brand
    const categoryId = target.category
    let list = byCategorieFilter(products, categoryId)
        list = byCategorieFilter(list, brandId)
        list = byActiveFilter(list)
    console.log(list)
}
export const brandsRenderCollback = (target:any)=>{
    let brandsListHtml = ``
        target.brands.forEach((brand:any)=>{
            brandsListHtml+=brandView(brand)
        })
    const brandsArea = document.querySelector('.content_container .brands_area')!
    brandsArea.innerHTML = brandsListHtml


}
