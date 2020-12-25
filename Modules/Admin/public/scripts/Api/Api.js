class Api{
    static instance = null
    static getInstance =()=>{
        Api.instance = !Api.instance? new Api():Api.instance
    }
   async fetch(Url, responseType='JSON', method = 'POST' , data={},headers ={"Content-Type": "application/json"}){
       return fetch(Url,{method:method,
       body:JSON.stringify(data),
           headers:{
             ...headers
           }
       }).then((responce) =>responce)
    }
}
export default Api
