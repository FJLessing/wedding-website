<template>
  <b-navbar
      id="site-menu"
      :class="['bg-white', ($route.meta.menuClass || '')]"
      type="light"
      shadow
      sticky
    >
    <b-navbar-brand href="#" v-b-toggle.side-nav>
      <b-icon-list />
    </b-navbar-brand>
    <b-sidebar id="side-nav"  bg-variant="dark" no-header shadow>
      <template #default="{ }">
        <div class="sidebar-custom-header">
          <b-icon-list v-b-toggle.side-nav />
        </div>
        <nav class="side-nav-inner" v-if="links.length > 0">
          <router-link
            class="nav-link"
            v-for="link in links"
            v-bind:key="link.path"
            :to="link.path"
          >{{link.meta.menuName || link.name}}</router-link>
        </nav>
      </template>
    </b-sidebar>
    <h1 class="title display-fancy-font" v-bind="$route">{{ $route.meta.title || $route.name }}</h1>
    <b-navbar-brand href="#" v-b-toggle.side-nav>
      <!-- TODO: add a better solution to center txt -->
      <b-icon-x :style="{opacity: 0}" />
    </b-navbar-brand>
  </b-navbar>

</template>

<script>
import { routes } from '@/router';

export default {
  name: 'site-menu',
  data () {
    return {
      links: [
        {
          name: 'Home',
          path: '/'
        }
      ]
    }
  },

  mounted () {
    // filter array to only those that have attribute
    this.links = routes.filter(({ meta }) => meta.showInMenu);
  }
}
</script>

<style lang="scss">
  @import '@/styles/common/_bootstrap-variables.scss';

  #site-menu {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: $grid-gutter-width $grid-gutter-width;

    .b-icon {
      font-size: $h1-font-size;
    }

    .title {
      font-size: 2.5rem;
      text-align: center;
      flex-grow: 1;
      color: $gray-600;
      margin: auto;
      font-weight: 400;

      @media screen and (min-width: map-get($grid-breakpoints, md )) {
        font-size: 4.5rem;
      }
    }
  }

  #side-nav {
    .sidebar-custom-header {
      color: $white;
      font-size: 3em;
      padding: 2rem 0;
      cursor: pointer;
    }

    .side-nav-inner {
      display: flex;
      flex-direction: column;
      min-height: 50vh;

      .nav-link {
        margin: auto;
        color: $white;
      }
    }
  }
</style>
