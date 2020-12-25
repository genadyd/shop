import {byActiveFilter, byCategorieFilter} from "../Filters/byListElementFilter.js";

export const productsListRender =(target:any)=>{
    const products = target.products
    const brandId = target.brand
    const categoryId = target.category
    let list = byCategorieFilter(products, categoryId)
        list = byCategorieFilter(list, brandId)
        list = byActiveFilter(list)
    console.log(list)
}
