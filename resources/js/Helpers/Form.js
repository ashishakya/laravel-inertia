import {Inertia} from '@inertiajs/inertia';
import Errors from "./Errors";

class Form {
    constructor() {
        this.errors = new Errors();
    }

    async get(url, options = {}) {
        await Inertia.visit(url, options);

        return this.inertiaPromiseResponse();
    }

    async post(url, data = {}, options = {}) {
        await Inertia.post(url, data, options);

        return this.inertiaPromiseResponse();
    }

    async put(url, data = {}, options = {}) {
        await Inertia.put(url, data, options);

        return this.inertiaPromiseResponse();
    }

    async patch(url, data = {}, options = {}) {
        await Inertia.patch(url, data, options);

        return this.inertiaPromiseResponse();
    }

    async delete(url, options = {}) {
        await Inertia.delete(url, options);

        return this.inertiaPromiseResponse();
    }

    inertiaPromiseResponse() {
        const {props} = Inertia.page;
        let errs = props.errors
        this.errors.record(errs);

        if (Object.keys(errors).length === 0) {
            return Promise.resolve()
        } else {
            return Promise.reject()
        }
    };
}

export default Form;
