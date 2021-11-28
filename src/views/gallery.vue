<template>
  <b-container class="gallery" tag="main">
    <b-row class="mb-3">
      <b-col>
        <p class="lead">
          Just a few photos we wanted to share with you...
        </p>
      </b-col>
    </b-row>
    <div>
        <viewer class="image-gallery" :images="images">
          <img class="gallery-image" v-for="image in images" :key="image.src" :src="image.src" :alt="image.alt"/>
        </viewer>
    </div>
  </b-container>
</template>

<script>
import Vue from 'vue';
import 'viewerjs/dist/viewer.css';
import VueViewer from 'v-viewer';

Vue.use(VueViewer, {
  defaultOptions: {
    zIndex: 9999,
    toolbar: false,
    title: false,
    inline: false,
    button: true,
    navbar: true,
    tooltip: true,
    movable: true,
    zoomable: true,
    rotatable: true,
    scalable: true,
    transition: true,
    fullscreen: true,
    keyboard: true
  }
});
export default {
  name: 'gallery',
  data () {
    return {
      images: []
    }
  },
  mounted () {
    for (let i = 1; i <= 47; i++) {
      const paddedI = String(i).padStart(2, '0');
      this.images.push({
        src: `/img/gallery/gallery-${paddedI}.jpg`,
        alt: `Image ${i}`
      });
    }
  }
}
</script>

<style scoped lang="scss">
@import '@/styles/common/_bootstrap-variables.scss';
.image-gallery {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;

  img {
    width: 80vw;
    height: auto;
    object-fit: cover;
    object-position: center;
    border-radius: 2px;
    cursor: pointer;

    @media screen and (min-width: map-get($grid-breakpoints, md)) {
      width: 25%;
    }
  }
}
</style>
