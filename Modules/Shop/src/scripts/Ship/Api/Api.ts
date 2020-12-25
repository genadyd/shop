class Api{
    public async exeq(url:string, data:any, type:string = "POST"){
        return await fetch(url,{method:type, headers:{'Content-Type': 'application/json'},body:JSON.stringify(data)})
    }
}
export default Api
