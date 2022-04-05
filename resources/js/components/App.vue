<template>
  <div>
    <Header />
    <main class="container">
      <router-view> </router-view>
      <!-- <PostList /> -->
    </main>
  </div>
</template>

<script>
import Header from "./Header.vue";
import PostList from "./posts/PostList.vue";

export default {
  name: "App",
  components: {
    Header,
    PostList,
  },
  data() {
    return {
      isLoading: false,
    };
  },
};
</script>
