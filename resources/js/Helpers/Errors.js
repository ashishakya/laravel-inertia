class Errors {
    constructor() {
        this.errors = {}
    }

    record(errors) {
        this.errors = errors;
    }

    all() {
        return this.errors;
    }

    /**
     * Determine if we have any errors.
     */
    any() {
        return Object.keys(this.errors).length > 0
    }

    /**
     * Retrieve the error message for a field.
     *
     * @param {string} field
     */
    get(field) {
        if (this.errors[field]) {
            return Array.isArray(this.errors[field]) ? this.errors[field][0] : this.errors[field]
        }
    }

    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clear(field) {
        if (field) {
            delete this.errors[field];
        }
    }

    clearAllErrors() {
        this.errors = {}
    }

    /**
     * Determine if an errors exists for the given field.
     *
     * @param {string} field
     */
    has(field) {
        return this.errors.hasOwnProperty(field)
    }
}

export default Errors
