<template>
    <div>
        <ul class="pagination justify-content-center">
            <li
                class="page-item"
                v-if="previousPageUrl"
            >
                <a
                    href="#"
                    @click.prevent="fetchPreviousPageData"
                    class="page-link"
                >
                    Prev
                </a>
            </li>
            <li
                class="page-item"
                :class="isActive(eachUrlArray.indexKey)"
                v-for="eachUrlArray in urlsArray"
                :key="eachUrlArray.indexKey"
            >
         <span v-if="eachUrlArray.type === 'URLS'">
            <InertiaLink
                href="#"
                @click.prevent="fetchDataForPage(eachUrlArray.indexKey)"
                class="page-link"
                :class="{ 'bg-blue-500 text-blue-700': eachUrlArray.isCurrentPage === true }"
            >
               {{eachUrlArray.pageNumber}}
            </InertiaLink>
         </span>
                <span v-else-if="eachUrlArray.type === 'ELIPSIS'">
         {{eachUrlArray.url}}
         </span>
            </li>
            <li
                class="page-item"
                v-if="nextPageUrl"
            >
                <InertiaLink
                    href="#"
                    @click.prevent="fetchNextPageData"
                    class="page-link"
                >
                    Next
                </InertiaLink>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['urlsArray', 'previousPageUrl', 'nextPageUrl'],
        methods: {
            isActive(currentPageNo) {
                const params = new URLSearchParams(window.location.search);
                if (parseInt(params.get('page')) === currentPageNo)
                    return 'active';
            },
            fetchNextPageData() {
                let nextPageUrl = new URL(this.nextPageUrl)
                let queryParams = new URLSearchParams(nextPageUrl.search);
                let nextPageNo = queryParams.get('page');
                this.$emit('input', nextPageNo)
            },
            fetchPreviousPageData() {
                let previousPageUrl = new URL(this.previousPageUrl)
                let queryParams = new URLSearchParams(previousPageUrl.search);
                let previousPageNo = queryParams.get('page');
                this.$emit('input', previousPageNo)
            },
            fetchDataForPage(pageNo){
                this.$emit('input', pageNo)
            }
        }
    }
</script>
