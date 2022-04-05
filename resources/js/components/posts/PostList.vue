<template>
  <section>
    <Loader v-if="isLoading" />
    <h3>POSTS:</h3>
    <div class="d-flex justify-content-end align-items-center mt-3">
      <Pagination :pagination="pagination" @on-page-change="getPosts" />
    </div>
    <PostCard v-for="post in posts" :key="post.id" :post="post" />
    <Pagination :pagination="pagination" @on-page-change="getPosts" />
  </section>
</template>

<script>
import Loader from "../Loader.vue";
import Pagination from "./Pagination.vue";
import PostCard from "../posts/PostCard.vue";
export default {
  name: "PostList",
  data() {
    return {
      posts: [],
      isLoading: true,
      pagination: {},
    };
  },
  components: {
    Loader,
    Pagination,
    PostCard,
  },
  methods: {
    getPosts(page = 1) {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/posts?page=" + page)
        .then((res) => {
          const { data, current_page, last_page } = res.data;

          this.posts = data;
          this.pagination = {
            currentPage: current_page,
            lastPage: last_page,
          };
        })
        .catch((err) => {
          console.log(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },

  mounted() {
    this.getPosts();
  },
};
</script>

<style>
</style>