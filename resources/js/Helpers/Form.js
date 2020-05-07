import {Inertia} from '@inertiajs/inertia';

const inertiaPromiseResponse = () => {
    const {props} = Inertia.page;
    let errors = props.errors

    return Object.keys(errors).length === 0 ? Promise.resolve() : Promise.reject();
};

const inertiaRequestWrapper = {
    async get(url, options = {}) {
        await Inertia.visit(url, options);

        return inertiaPromiseResponse();
    },

    async post(url, data = {}, options = {}) {
        await Inertia.post(url, data, options);

        return inertiaPromiseResponse();
    },

    async put(url, data = {}, options = {}) {
        await Inertia.put(url, data, options);

        return inertiaPromiseResponse();
    },

    async patch(url, data = {}, options = {}) {
        await Inertia.patch(url, data, options);

        return inertiaPromiseResponse();
    },

    async delete(url, options = {}) {
        await Inertia.delete(url, options);

        return inertiaPromiseResponse();
    },
};

export {inertiaRequestWrapper as form};
