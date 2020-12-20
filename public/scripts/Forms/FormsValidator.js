class FormsValidator {
    patterns = {
        email: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/,
        password: /^[a-zA-Z\d]{4,}$/g,
        text: /^[A-Za-z\s]+/
    }
    messages = {
        email: "Cras a auctor justo",
        password: "Suspendisse vitae risus non turpis",
        text: "Fusce sit amet laoreet nulla"
    }

    valid(val, type) {
        const inputValidObj = {}
        if (this.patterns[type]) {
            if (this.patterns[type].test(val)) {
                return {
                    ...inputValidObj,
                    valid: true,
                    message: ''
                }
            }else{
                return {
                    ...inputValidObj,
                    valid: false,
                    message: this.messages[type]
                }
            }
        }
        return {
            ...inputValidObj,
            valid: true,
            message: ''
        }
    }
}
export default FormsValidator
