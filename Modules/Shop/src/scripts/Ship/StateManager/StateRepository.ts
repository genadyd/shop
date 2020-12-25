class StateRepository{
    public static REPOSITORY:any = {}

    public setStateElement(stateElementName:string, value:any, callbackFunc?:any){
        // debugger
        StateRepository.REPOSITORY[stateElementName] = value
        if(callbackFunc && typeof callbackFunc == 'function'){
           StateRepository.REPOSITORY.setActionCallback = callbackFunc
        }
    }
    public getStateElement(stateElementName:any, callbackFunc?:any){
        return StateRepository.REPOSITORY[stateElementName]
    }
}
export default StateRepository
