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
        <h2>venue &amp; accommodation deets</h2>
        <p>We're so excited that our beautiful venue can accommodate nearly all of our gorgeous guests (and even those that aren't so mooi)!</p>
        <p>The accommodation is available for both Friday and Saturday evenings, so that we can celebrate the whole weekend.</p>
        <p>Guests can be accommodated in both rooms or in a beautiful glamping setup.</p>
        <p>The rooms are self-catering and included in the accommodation costs are breakfast for both Saturday and Sunday (this can be altered by the venue if needed).</p>
        <p>We will be having a braai for those who are joining us on Friday.</p>
        <br/>
        <p>Rooms will be charged at R800 per person for the weekend with glamping tents, <i>(with real beds and a plug!)</i> at R400 per person.</p>
        <p>A delicious chef's breakfast can also be added to your booking at R120 for Saturday and Sunday.</p>
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
          Kindly note that these services will regrettably be at the cost of the guest.<br/><br/>
          For those who will be traveling by air; the following shuttle service companies  operate from the airport:<br/>
          <ul class="unstyle-list">
            <li><a alt="Zeelie taxis Website" href="https://zeelietaxis.co.za/" >Zeelie taxis</a></li>
            <li><a alt="Ken’s Airport Shuttle Website" href="https://ken91861.wixsite.com/kens-airport-shuttle" >Ken’s Airport Shuttle</a></li>
            <li><a alt="Woober Website" href="https://woober.co.za/" >Woober</a></li>
          </ul>
        </p>
      </b-col>
    </b-row>
    <b-row class="mb-4">
      <b-col class="mb-3" :md="5">
        <img class="img-fluid w-100" src="/img/location/location-content.jpg" />
      </b-col>
      <b-col class="mb-3 h-100 spread-content remove-min-height-mobile" :md="7" :style="{ minHeight: mapHeight }">
        <h2 class="mb-3 mt-auto">activities</h2>
        <p class="my-2">For those who can’t sit still and kuier, the venue offers a variety activities such as:</p>
        <ul class="unstyle-list mt-2 mb-auto">
          <li>Horse-back riding - <i>vir die cool kids</i></li>
          <li>4x4 trails  - <i>vir die wat pandas of ’n hilux het</i></li>
          <li>Biking trails - <i>bikes can be hired on site</i></li>
          <li>Hiking trails - <i>vir die wat wil klim en klouter</i></li>
          <li>We can even arrange a cricket game on their gorgeous green!</li>
        </ul>
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
  .unstyle-list {
    list-style: none;
    padding-left: 0;
    margin-top: 1rem;

    li {
      margin-bottom: .75em;
    }
  }
</style>
