import _AbstractFormProcessor from "../../../public/scripts/Forms/_AbstractFormProcessor.js";

class LoginFormProcessor extends _AbstractFormProcessor{
    constructor(api, validator) {
       super(api, validator)
        this.sendForm()
    }
    sendForm(){
        const form = document.querySelector('#login_form')
        const button = form.querySelector('#login')
        if(!button) return
        button.addEventListener("click",async (e)=>{
            e.preventDefault()
            this.flags = []
            const collection =this.formFieldsCollect(form)
            this.formValidator(collection)
            if(this.flags.every(val=>val)){
                let c = await this.formGetCrypt('/admin/crypt')
                setTimeout(() => {
                    /*get crypt for form sequre ++++*/
                    const cryptFierld = form.querySelector('#crypt')
                    if (cryptFierld && c) cryptFierld.value = c.crypt
                    form.submit()
                }, 500)
            }
            /*+++++++*/
    })
   }
}
export default LoginFormProcessor
