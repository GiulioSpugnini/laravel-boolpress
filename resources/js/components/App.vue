<template>
  <div>
    <Header />
    <main class="container">
      <router-view> </router-view>
      <!-- <Card /> -->
    </main>
  </div>
</template>

<script>
import Header from "./Header.vue";
import Card from "./posts/Card.vue";

export default {
  name: "App",
  components: {
    Header,
    Card,
  },
  data() {
    return {
      isLoading: false,
    };
  },
};
</script>
