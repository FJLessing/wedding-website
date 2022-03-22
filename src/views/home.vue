<template>
  <b-container class="home" tag="main">
    <b-row class="mb-3">
      <b-col>
        <h1>Wedding</h1>
      </b-col>
    </b-row>
    <b-row class="mb-4">
      <b-col>
        <div class="image-hero">
          <img src="/img/homepage/hero-1.webp" alt="Engagement photo 1" />
          <img src="/img/homepage/hero-2.webp" alt="Engagement photo 2" />
          <img src="/img/homepage/hero-3.webp" alt="Engagement photo 3" />
        </div>
      </b-col>
    </b-row>
    <b-row class="mb-3">
      <b-col>
        <h2 class="display-5">25 - 27 march '22</h2>
      </b-col>
    </b-row>
    <b-row class="mb-3">
      <b-col  :md="8" :xxl="6" :offset-md="2" :offset-xxl="3">
        <site-countown></site-countown>
      </b-col>
    </b-row>
    <b-row class="mb-3 mt-5">
      <b-col>
        <p>Itʼs finally happening!</p>
        <p>Welcome to our wedding website, weʼre so glad youʼre here!
        We look forward to sharing this very special occasion with you.
        This website is here to provide you with all the details of our special event.</p>
        <p>We canʼt wait to see you there!</p>
        <p class="hashtags mt-4">
          <span>#lovingvonlazer</span>
          <span>#LekkerLessing</span>
        </p>
      </b-col>
    </b-row>
    <b-row class="mb-5">
      <b-col class="d-flex justify-content-center text-white">
        <b-button class="text-white" variant="primary" v-b-toggle.side-nav>Explore our Website</b-button>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import siteCountown from '../components/site-countown.vue'
export default {
  components: { siteCountown },
  name: 'home'
}
</script>

<style scoped lang="scss">
@import '@/styles/common/_bootstrap-variables.scss';
  .image-hero {
    display: flex;
    max-width: 100%;
    overflow: hidden;

    img {
      max-width: 33.33333333333333333333333333333333%;
      height: auto;
      object-fit: cover;
      object-position: center;
      margin: 0 auto;
    }

    @media screen and (min-width: map-get($grid-breakpoints, md)) {
      max-height: 450px;
      overflow: hidden;
    }
  }

  .hashtags {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;

    > span {
      font-size: 1.25rem;
      font-weight: bold;
      color: $gray-800;

      &:not(:last-child) {
        margin-right: 1rem;
      }
    }
  }
</style>
