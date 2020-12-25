import StateRepository from "./StateRepository.js";

class StateCreator {
    public create(stateObject: StateInterface) {
        const obj = {
            ...stateObject,
            getActionCallback: () => {
            },
            setActionCallback: (target: any = '') => {}
        }
        StateRepository.REPOSITORY = this.stateProxy(obj)

    }

    protected stateProxy(obj: any) {
        return new Proxy(obj, {
            get: (target, key: any) => {
                if (!['getActionCallback', 'setActionCallback'].includes(key)) {
                    target.getActionCallback()
                }
            },
            set: (target, key: any, value) => {
                target[key] = value
                target.setActionCallback(target)
                return true
            }
        })
    }


}

export default StateCreator
