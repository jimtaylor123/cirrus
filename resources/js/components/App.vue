<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Hi {{ user.name }}</div>

     
            <router-view></router-view>

        
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "App",
  props: ["user"],
  created() {
    this.title = this.$route.meta.title;
  },
  data: function () {
    return {
      title: "",
    };
  },
  watch: {
    $route(to) {
      this.title = to.meta.title;
    },

    title() {
      document.title = this.title + " | Cirrus HQ customer management portal";
    },
  },
};
</script>

<style scoped>
</style>