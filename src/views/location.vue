<template>
  <b-container class="location" tag="main">
    <b-row>
      <b-col>
        <h1 class="page-title">Louvain Guest Farm</h1>
        <img class="img-fluid w-100" src="/img/location/location-hero-1.jpg" />
      </b-col>
    </b-row>
    <b-row class="mt-5 mb-5">
      <b-col class="mb-3 h-100 spread-content remove-min-height-mobile" :md="6" :style="{ minHeight: mapHeight }">
        <h2>venue &amp; accomodation deets</h2>
        <p>Weʼre so excited that our beautiful venue can accommodate nearly all of our gorgeous guests (and even those that arenʼt so mooi)!</p>
        <p>The accommodation is available for both Friday and Saturday evenings, so that we can celebrate the whole weekend</p>
        <p>Guests can be accommodated in both rooms or in a beautiful glamping setup.</p>
        <p>The rooms are self-catering and included in the accommodation costs are breakfast for both Saturday and Sunday (this can be altered by the venue if needed).</p>
        <p>We will be having a braai for those who are joining us on Friday</p>
      </b-col>
      <b-col class="mb-3" :md="6">
        <GmapMap
          :center="{ lat: -33.811040281111794, lng: 22.64850254251352 }"
          :zoom="17"
          :style="{width: '100%', height: mapHeight}"
          map-type-id="hybrid"
        ></GmapMap>
      </b-col>
    </b-row>
    <b-row class="mb-4 heading-row">
      <b-col>
        <h1>book here</h1>
      </b-col>
    </b-row>
    <b-row class="mb-4">
      <b-col>
        <p>
          To ensure everyone’s enjoyment the wedding is adult-only.<br/>
          However, we are aware that there are numerous new mommies and daddies, and so child-care services shall be available during the wedding event for kids under the age of two.
          Kindly note that these services will regrettably be at the cost of the guest.<br/>
          For those who will be traveling by air; the following shuttle service companies  operate from the airport:<br/>
          put shuttle companies <a href="#" alt="Link to external website for shuttles">here.</a>
        </p>
      </b-col>
    </b-row>
    <b-row class="mb-4">
      <b-col class="mb-3" :md="5">
        <img class="img-fluid w-100" src="/img/location/location-content.jpg" />
      </b-col>
      <b-col class="mb-3 h-100 spread-content remove-min-height-mobile" :md="7" :style="{ minHeight: mapHeight }">
        <h2 class="mb-3">activities</h2>
        <p class="mb-auto">For those who can’t sit still and kuier, the venue offers a variety activities such as:</p>
        <p class="mb-auto">Horse-back riding - vir die cool kids</p>
        <p class="mb-auto">4x4 trails  - vir die wat pandas of ’n hilux het</p>
        <p class="mb-auto">Biking trails (bikes can be hired on site)</p>
        <p class="mb-auto">Hiking trails - vir die wat wil klim en klouter</p>
        <p class="mb-auto">We can even arrange a cricket game on their gorgeous green!</p>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: 'location',
  data () {
    return {
      mapHeight: '400px'
    }
  }
}
</script>

<style lang="scss">
  .spread-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
</style>
