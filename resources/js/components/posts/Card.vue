<template>
  <section>
    <div v-for="post in posts" :key="post.id">
      <div class="card mb-3 mt-2">
        <div class="row g-0">
          <div class="col-md-4">
            <!-- <img src="..." class="img-fluid rounded-start" alt="..." /> -->
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ post.title }}</h5>
              <p class="card-text">
                {{ post.content }}
              </p>
              <p class="card-text">
                <small class="text-muted"
                  >{{ post.author }} {{ dateTime(post) }}</small
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
              <span
                v-for="tag in post.tags"
                :key="tag.id"
                class="badge"
                :style="`background-color:${tag.color}`"
              >
                {{ tag.label }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Card",
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    getPosts() {
      axios
        .get("http://localhost:8000/api/posts")
        .then((res) => {
          this.posts = res.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .then(() => {
          console.log("chiamata terminata");
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