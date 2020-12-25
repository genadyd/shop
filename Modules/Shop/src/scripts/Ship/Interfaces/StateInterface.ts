interface StateInterface{
    products:any[],/*all product collection*/
    productsMap:{[key:number]:number},
    brands:any[],/*all brands collection*/
    brandsMap:{[key:number]:number}
    categories:any[],/*all categories collection*/
    categoriesMap:{[key:number]:number}
    card:any[],/* card collection*/
    brandId:number|null,/*brand id*/
    categoryId:number|null, /*category id*/
}
