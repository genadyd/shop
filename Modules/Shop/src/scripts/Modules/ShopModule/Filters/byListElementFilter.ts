export const byCategoryFilter=(products:any,categoryId:number )=>{
    if(categoryId) {

        return products.filter((val: any) => categoryId === val.category_id)
    }

    return products
}
export  const byBrandFilter = (products:any,brandId:number)=>{
    if(brandId) {
        return products.filter((val: any) => brandId === val.brand_id)
    }
    return products
}
export  const byActiveFilter = (products:any)=>{
        return products.filter((val: any) => +val.active === 1)
}
