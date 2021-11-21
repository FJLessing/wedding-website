<template>
  <div id="app">
    <site-menu/>
    <router-view/>
  </div>
</template>

<script>
import siteMenu from '@/components/site-menu/site-menu.vue'
export default {
  name: 'App',
  components: {
    siteMenu
  }
}
</script>

<style lang="scss">
</style>
