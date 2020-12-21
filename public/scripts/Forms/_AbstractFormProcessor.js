class _AbstractFormProcessor{
    constructor(api, validator) {
        this.api = api
        this.flags = []
        this.validator = validator
    }
    sendForm(){}/*abstract method should be reloaded*/
    /*
    * get sequre crypt from server
    * */
    async formGetCrypt(ryptUrl){
        this.api.getInstance()
        const api = this.api.instance
        let response = await api.fetch(ryptUrl).then(data=>data.json())
        if(response) return response
        return 0
    }
    formFieldsCollect(form){
        const inputs = form.querySelectorAll('input')
        if(inputs.length>0)
            return [...inputs].filter((input)=>['text','file','number','password','email', 'hidden'].includes( input.getAttribute('type')))
    }
    formValidator(inputs){
        inputs.forEach(input => {
            let type = input.getAttribute('type')
            let value = input.value
            let id = input.id
            let { valid, message} = this.validator.valid(value,type)
            debugger
            let elem = document.getElementById(id)
            if(!valid){
                elem.nextSibling.innerText = message
            }else{
                elem.nextSibling.innerText = ''
            }
            this.flags.push(valid)
        })
    }

}
export default _AbstractFormProcessor
