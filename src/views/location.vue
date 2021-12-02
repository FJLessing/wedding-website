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
        <h1 id="booking">book here</h1>
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
    <b-row>
      <b-col md=8 offset-md=2>
        <h2 class="fancy-title-font">Accommodation Price List</h2>
        <p>Louvain offers plenty of accommodation, enough for all of our guests! We really hope you can join us in staying at the venue.</p>
      </b-col>
    </b-row>
    <b-row class="pricelist-row">
      <b-col md=8 offset-md=2>
        <div class="pricelist">
          <div class="pricelist-row">
            <span>standard accommodation</span>
            <span>&nbsp;</span>
            <span>R800 pp/per night</span>
          </div>
          <div class="pricelist-row">
            <span>tent accommodation</span>
            <span>&nbsp;</span>
            <span>R400 pp/per night</span>
          </div>
          <div class="pricelist-row">
            <span>optional breakfast</span>
            <span>&nbsp;</span>
            <span>R175 pp</span>
          </div>
        </div>
      </b-col>
    </b-row>
    <b-row class="pricelist-row mb-5">
      <b-col md=6 offset-md=2>
        <div class="extra-info">* breakfasts will be served at 8am in Die Ou Grootboom Venue conveniently located near the accommodation</div>
        <div class="extra-info">* standard accommodation is limited to 60 persons</div>
      </b-col>
      <b-col class="ml-md-n5" cols=8 md=3 offset=2 offset-md=0>
        <img class="img-fluid w-100 mt-md-n4" src="/img/location/location-flower.png" />
      </b-col>
    </b-row>
    <b-row class="mb-2">
      <b-col md=8 offset-md=2>
        <p>click on the book now button for effortless booking.</p>
        <b-button variant="primary" class="mb-4" @click="() => this.showBooking = !this.showBooking">book now</b-button>
        <p>For any further queries feel free to contact Michael Wood directly at <a href="mailto:guestfarm@louvain.co.za">guestfarm@louvain.co.za</a></p>
      </b-col>
    </b-row>
    <booking-form v-if="showBooking" />
    <b-row class="mb-4">
      <b-col class="mb-3" :md="5">
        <img class="img-fluid w-100" src="/img/location/location-content.jpg" />
      </b-col>
      <b-col class="mb-3 h-100 spread-content remove-min-height-mobile" :md="7" :style="{ minHeight: mapHeight }">
        <h2 class="mb-3 mt-3 mt-md-auto">activities</h2>
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
import bookingForm from '@/components/location/booking-form.vue'

export default {
  name: 'location',
  components: {
    bookingForm
  },
  data () {
    return {
      mapHeight: '400px',
      showBooking: false
    }
  },
  methods: {
    onMapLoaded (map) {
      this.mapHeight = `${map.getDiv().offsetHeight}px`
    }
  }
}
</script>

<style lang="scss">
@import '@/styles/common/_bootstrap-variables.scss';

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

  .pricelist-row {
    text-align: left;
  }

  .pricelist {
    .pricelist-row {
      display: flex;
      justify-content: stretch;
      margin: 2em 0;
      padding-right: 1em;

      span {
        flex: 1;
        display: block;
        font-weight: 300;

        &:nth-child(3n),
        &:nth-child(3n - 2) {
          flex-basis: auto;
          flex-grow: 0;
          widows: auto;
        }

        &:nth-child(3n - 1) {
          border-bottom: 1px solid #acacac;
          line-height: .75em;
          margin: auto .5em;
        }
      }

      @media screen and (min-width: map-get($grid-breakpoints, md)) {
        padding-right: 0;

        span {
          font-size: 1.35em;

          &:nth-child(3n - 1) {
            margin: auto 1em;
          }
        }
      }
    }
  }

  .pricelist-row {
      .extra-info {
        font-weight: 300;
        margin-top: .5em;
        margin-bottom: .5em;
        text-transform: uppercase;

        @media screen and (min-width: map-get($grid-breakpoints, md)) {
          font-size: .9em
        }
      }
  }
</style>
