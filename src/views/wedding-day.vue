<template>
  <b-container class="schedule" tag="main">

    <b-row class="mb-3">
      <b-col>
        <h1 class="page-title">welcome</h1>
      </b-col>
    </b-row>

    <b-row>
      <b-col md-cols="6" md-offset="3">
        <p>Baie dankie aan almal wat na ons ou daggie toe kom! Welcome to everyone <b-icon-emoji-smile></b-icon-emoji-smile></p>
        <p>Die seremonie begin om <b>15h45</b> vir  <b>16h00</b> op Saterdag 26 Maart, by Louvain Guest Farm se Bos Venue, kom asseblief bietjie vroeër en gee tyd vir so paar minute se stap van die parkeering af.</p>
        <p>As julle nog aanwysings nodig het klik
          <a href="https://waze.com/ul/hk9bpekuhg" target="_blank">hier vir Waze</a> of
          <a href="https://goo.gl/maps/QnYCchbPox9TScBh8" target="_blank">hier vir Google Maps.</a> of
          <a href="https://maps.apple.com/?address=Eden%20District%20Municipality,%20WC,%20South%20Africa&auid=1279940751703411958&ll=-33.811008,22.648426&lsp=7618&q=Eden%20District%20Municipality&_ext=EiYpHkvEAC44QcAxf/s6cM6ANEA5Ksb5m1CoQMBB3EYDeAu0N0BQDA%3D%3D" target="_blank">hier vir Apple Maps</a>
        </p>
        <p>As dit lyk asof dit gaan reën, bring dalk 'n sambreel saam, ons stocks is limited!</p>
      </b-col>
    </b-row>

    <b-row class="my-3">
      <b-col>
        <h2 class="sub-title">at the venue</h2>
      </b-col>
    </b-row
    >
    <b-row>
      <b-col md-cols="6" md-offset="3">
        <p><b>Vrydag Aand</b> sal daar 'n lekker braai wees vir almal wat aankom by Louvain.</p>
        <p>Daar sal ook 'n kontant kroeg wees (met kaart fasiliteite)</p>
      </b-col>
    </b-row>

    <b-row>
      <b-col md-cols="6" md-offset="3">
        <p>Vir die wat ontbyt bespreek het, dit word bedien tussen 8h00 - 10h00, en daar sal 'n klein snack beskikbaar wees die middag.</p>
        <p>Drankies sal beskikbaar wees by die bar vanaf 12h00, en ons het proper koffie gereël vir die kamers.</p>
      </b-col>
    </b-row>

    <b-container class="container-fluid schedule-list">
      <b-row class="mb-5 mt-5">
        <b-col>
          <h1 class="page-title">schedule</h1>
        </b-col>
      </b-row>

      <b-row>
        <b-col class="time" cols="3">
          04h00PM
        </b-col>
        <b-col class="activity" cols="9">
          ceremony
        </b-col>
      </b-row>
      <b-row>
        <b-col class="time" cols="3">
        </b-col>
        <b-col class="activity" cols="9">
          canapés
        </b-col>
      </b-row>
      <b-row>
        <b-col class="time" cols="3">
        </b-col>
        <b-col class="activity" cols="9">
          dinner and speeches
        </b-col>
      </b-row><b-row>
        <b-col class="time" cols="3">
        </b-col>
        <b-col class="activity" cols="9">
          desert
        </b-col>
      </b-row>
      <b-row class="mb-5">
        <b-col class="time" cols="3">

        </b-col>
        <b-col class="activity pt-2" cols="9">
          parrie
        </b-col>
      </b-row>
    </b-container>
    <b-row class="mb-extra">
      <b-col class="align-content-center" md="6">
        <div>
          <h2 class="text-lightgrey">dress code - semi formal</h2>
          <p>To all the ladies: fair warning, heels will be more practical after the ceremony, <i>tensy jy 4x4 hakke besit.</i></p>
        </div>
        <div>
          <h2 class="text-primary">Your presence is our present</h2>
          <p class="mb-5">however, if you do wish to spoil us, a contribution to our wedding wishing well would be greatly appreciated.</p>
          <b-button class="btn-primary" v-b-toggle.banking-details>
            Banking Details
          </b-button>
          <b-collapse id="banking-details" class="banking-details mt-5">
            <b-card >
              <b-card-header class="mb-3 mx-0 mt-0">Wedding Wishing Well Account</b-card-header>
              <b-card-body class="p-0">
              Discovery Bank <br/>
              Account Number: 12515982601<br/>
              Account Holder: Francois Lessing<br/>
              Account Type: Savings Account<br/>
              Branch Code: 679000<br/>
              BIC/SWIFT: DISCZAJJXXX<br/>
              </b-card-body>
            </b-card>
          </b-collapse>
        </div>
      </b-col>
      <b-col md="4" offset-md="2" class="mt-5">
        <img src="/img/wedding-day/dress-code.jpg" alt="Dress code flavour image." class="img-fluid">
      </b-col>
    </b-row>

  </b-container>
</template>

<script>
export default {
  name: 'wedding-day'
}
</script>

<style lang="scss">
@import '@/styles/common/_bootstrap-variables.scss';
  .schedule {
    .schedule-list {
      .row {
        margin: 2rem auto;
      }

      .time {
        text-align: right;
        color: $primary;
        padding-right: 2.25em;
      }

      .activity {
        font-size: 1.25em;
        text-transform: uppercase;
        text-align: left;
        border-bottom: 1px solid $gray-200;
        font-weight: 300;
        vertical-align: bottom;
        margin-bottom: .25em;
      }
    }

    .align-content-center {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;

      > div:first-child {
        margin-bottom: 3rem;
      }
    }

    .mb-extra {
      margin-bottom: 10rem;
    }

    .text-lightgrey {
      color: $gray-700;
    }
  }
</style>
