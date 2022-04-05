<template>
  <section>
    <Loader v-if="isLoading" />
    <div class="d-flex justify-content-end align-items-center mt-3">
      <Pagination :pagination="pagination" @on-page-change="getPosts" />
    </div>
    <div v-for="post in posts" :key="post.id">
      <div class="card mb-3 mt-2">
        <div class="row g-0">
          <div class="col-md-4">
            <img
              :src="post.image"
              class="img-fluid rounded-start m-1"
              alt="img"
            />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="d-flex justify-content-end align-items-center">
                <span class="badge-info p-2"
                  ><router-link role="button" to="/HomePage"
                    >Vedi</router-link
                  ></span
                >
              </div>
              <h5 class="card-title">{{ post.title }}</h5>
              <p class="card-text">
                {{ post.content }}
              </p>
              <p class="card-text">
                <small class="text-muted"
                  >{{ post.author }} - {{ dateTime(post) }}</small
                >
              </p>
            </div>
          </div>
          <div class="col-12">
            <div
              class="
                card-footer
                d-flex
                justify-content-between
                align-items-center
              "
            >
              <span :class="`badge badge-pill badge-${post.category.color}`">
                {{ post.category.label }}
              </span>
              <div>
                <span
                  v-for="tag in post.tags"
                  :key="tag.id"
                  class="badge mr-2"
                  :style="`background-color:${tag.color}`"
                >
                  {{ tag.label }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Pagination :pagination="pagination" @on-page-change="getPosts" />
  </section>
</template>

<script>
import Loader from "../Loader.vue";
import Pagination from "../posts/Pagination.vue";
export default {
  name: "Card",
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
    dateTime(post) {
      const postDate = new Date(post.updated_at);
      let days = postDate.getDate();
      let months = postDate.getMonth() + 1;
      const year = postDate.getFullYear();
      if (days < 10) days = "0" + days;
      if (months < 10) months = "0" + months;
      return `${days}/${months}/${year}`;
    },
  },

  mounted() {
    this.getPosts();
  },
};
</script>

<style>
</style>