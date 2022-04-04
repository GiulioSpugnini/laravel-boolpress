<template>
  <section>
    <div v-for="post in posts" :key="post.id">
      <div class="card mb-3" style="max-width: 540px">
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
                  >{{ post.author.name }}{{ post.updated_at }}</small
                >
              </p>
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
  },
  mounted() {
    this.getPosts();
  },
};
</script>

<style>
</style>