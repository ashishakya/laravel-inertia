<template>
    <div>
        <ul class="pagination justify-content-center">
            <li
                class="page-item"
                v-if="previousPageUrl"
            >
                <InertiaLink
                    :href="previousPageUrl"
                    class="page-link"
                >
                    Prev
                </InertiaLink>
            </li>
            <li
                class="page-item"
                :class="isActive(eachUrlArray.indexKey)"
                v-for="eachUrlArray in urlsArray"
                :key="eachUrlArray.indexKey"
            >
         <span v-if="eachUrlArray.type === 'URLS'">
            <InertiaLink
                :href="eachUrlArray.url"
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
                    :href="nextPageUrl"
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
            }
        }
    }
</script>
