<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!--                <a class="navbar-brand" href="{{ url('/') }}"></a>-->
                <inertia-link class="navbar-brand" href="/">Inertia App</inertia-link>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Manage <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <inertia-link :href="$route('leads.index')" class="dropdown-item">Leads</inertia-link>
                                <inertia-link :href="$route('packages.index')" class="dropdown-item">Packages</inertia-link>
                            </div>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $page.auth.user.name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" @click="handleLogout">Logout</a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <FlashMessage @hide-flash-message="hideFlashMessage"
                          v-if="shouldShowFlashMessage"/>
            <slot/>
        </main>
    </div>
</template>

<script>
    import FlashMessage from "../Pages/Utilities/FlashMessage";

    export default {
        data() {
            return {
                shouldShowFlashMessage: true
            }
        },
        methods: {
            async handleLogout() {
                await axios.post('/logout');

                window.location.href = '/';
            },
            hideFlashMessage() {
                this.shouldShowFlashMessage = false;
            }
        },
        watch: {
            '$page.flash': {
                handler() {
                    this.shouldShowFlashMessage = true
                },
                deep: true,
            },
        },
        components: {
            FlashMessage
        }
    }
</script>

<style scoped>

</style>
