<template>
  <div :class="`alert alert-${type}` || 'info'" role="alert">
    <slot> </slot>
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