<template>
  <div :class="`alert alert-${type}||'info`" role="alert">
    {{ message }}
  </div>
</template>

<script>
export default {
  name: "Alert",
  props: ["type", "message"],
};
</script>

<style>
</style>