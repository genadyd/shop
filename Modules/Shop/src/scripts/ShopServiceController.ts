import {state} from "./Ship/State/state.js";
import Api from "./Ship/Api/Api.js";
import StateRepository from "./Ship/StateManager/StateRepository.js";
import StateCreator from "./Ship/StateManager/StateCreator.js";

class ShopServiceController{
    private state:StateInterface = state
    private creator = new StateCreator()
    private api:Api = new Api()
    private repository = new StateRepository();

    constructor() {

        this.fillState(this.state)
        this.creator.create(this.state)

    }
  async fillState(state:StateInterface){
        const url = 'api/fill_state'
       const promise = await this.api.exeq(url,{}).then((data)=>data.json())
       this.repository.setStateElement('brands',promise.brands)
      /*map*/
      let brandsMap:any ={}
      promise.brands.forEach(( val:any, index:number)=>{brandsMap[val.id]=index})
      this.repository.setStateElement('brandsMap',brandsMap)
      /*---*/
       this.repository.setStateElement('products',promise.products)
      /*map*/
      let productsMap:any ={}
      promise.products.forEach(( val:any, index:number)=>{productsMap[val.id]=index})
      this.repository.setStateElement('productsMap',productsMap)
      /*----*/
       this.repository.setStateElement('categories',promise.categories, /*callback*/)
      /*map*/
      let categoriesMap:any ={}
      promise.categories.forEach(( val:any, index:number)=>{categoriesMap[val.id]=index})
      this.repository.setStateElement('categoriesMap',categoriesMap)
      /*-----*/
   }
}
export default ShopServiceController
