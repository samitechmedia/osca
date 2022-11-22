<template>
  <div id="dev">
    <nav class="dev-bar">
      <img src="http://3.9.201.99:8080/images/misfits-logo.png" alt="Misfits" />
      <router-link
        v-for="route in $router.options.routes"
        :key="route.fullPath"
        :to="route.path"
        >{{ route.path }}</router-link
      >
    </nav>
    <router-view v-if="$route.path !== '/'"></router-view>
    <div class="monit" v-else>
      Development view of particular widgets to be used on OSCA rollout
    </div>
  </div>
</template>

<script>
export default {
  name: 'dev',
  components: {},
};
</script>

<style lang="scss">
body {
  padding: 0;
  margin: 0;
  min-height: 100vh;
}

#dev {
  overflow: hidden;
}

.dev-bar {
  display: flex;
  width: 100%;
  background: rebeccapurple;
  padding: rem(10px);
  align-items: center;

  img {
    margin-right: rem(50px);
  }
}

.monit {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: rem(30px);
  font-weight: bold;
  color: rebeccapurple;
  padding: rem(20px);
}

a {
  padding: rem(10px);
  text-decoration: none;
  background: white;
  color: black;
  border-radius: rem(5px);
  margin: rem(10px);
}
</style>
