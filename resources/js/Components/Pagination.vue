<template>

  <div v-if="links.length > 3">
    <div class="flex flex-wrap mt-8">
      <template v-for="(link, key) in links" :key="key">
        <div
          v-if="link.url === null"
          class="mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded sm:mr-1"
          v-html="link.label"
        />
        <Link
        @click="updateCurrentPage(link.label)"
          v-else
          class="mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-primary focus:text-primary sm:mr-1"
          :class="{ 'bg-blue-700 text-white': link.active }"
          :href="link.url"
          v-html="link.label"
        />
      <div class="flex justify-between mt-4 sm:hidden">

    </div>
         
      </template>

    </div>

  <button @click="goToPreviousPage" :disabled="currentPage === 1">Previous</button>
      <button @click="goToNextPage" :disabled="currentPage === totalPages">Next</button>
  </div>
</template>


<script>
import { defineComponent } from "vue";
import { Link,router } from "@inertiajs/vue3";
export default defineComponent({
      data() {
    return {
      currentPage:1,
      totalPages: 10, 
    };
  },
    components: {
        Link,
    },
    props: {
        links: Array,
        page:Number
    },
    methods: {
        updateCurrentPage(data){
         this.currentPage = data;
           },
    goToPreviousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    goToNextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
  },
});
</script>
