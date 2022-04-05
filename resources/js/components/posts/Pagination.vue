<template>
  <nav>
    <ul class="pagination">
      <li
        class="page-item"
        role="button"
        v-if="pagination.currentPage > 1"
        @click="$emit('on-page-change', pagination.currentPage - 1)"
      >
        <span class="page-link" href="#">Precedente</span>
      </li>
      <li
        v-for="page in pagination.lastPage"
        :key="page"
        class="page-item"
        role="button"
        :class="{ active: page == pagination.currentPage }"
        @click="$emit('on-page-change', page)"
      >
        <span class="page-link">{{ page }}</span>
      </li>
      <li
        class="page-item"
        role="button"
        v-if="pagination.currentPage"
        @click="$emit('on-page-change', pagination.currentPage + 1)"
      >
        <span class="page-link" href="#">Successiva</span>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "Pagination",
  props: ["pagination"],
};
</script>

<style>
</style>