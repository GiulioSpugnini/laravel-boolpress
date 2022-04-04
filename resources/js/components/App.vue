<template>
  <div class="container">
    <Header />
    <main>
      <Card />
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
};
</script>
