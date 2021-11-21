<template>
  <b-container class="schedule" tag="main">
    <b-container-fluid class="schedule-list">
      <b-row class="mb-5">
        <b-col>
          <h1 class="page-title">schedule</h1>
        </b-col>
      </b-row>

      <b-row>
        <b-col class="time" cols="3">
          03PM
        </b-col>
        <b-col class="activity" cols="9">
          cermony
        </b-col>
      </b-row>
      <b-row>
        <b-col class="time" cols="3">
          04PM
        </b-col>
        <b-col class="activity" cols="9">
          canapés
        </b-col>
      </b-row>
      <b-row>
        <b-col class="time" cols="3">
          06PM
        </b-col>
        <b-col class="activity" cols="9">
          dinner and speeches
        </b-col>
      </b-row>
      <b-row class="mb-5">
        <b-col class="time" cols="3">
          08PM<br/>
          01AM
        </b-col>
        <b-col class="activity pt-2" cols="9">
          parrie
        </b-col>
      </b-row>
    </b-container-fluid>
    <b-row class="mb-extra">
      <b-col class="mb-3 align-content-center" md="6">
        <div>
          <h2>dress code - semi formal</h2>
          <p>To all the ladies: fair warning, heels will be more practical after the ceremony (tensy jy 4x4 hakke besit).</p>
        </div>
        <div>
          <h2 class="text-primary">Your presence is our present</h2>
          <p>however, if you do wish to spoil us, a contribution to our wedding wishing well would be greatly appreciated.</p>
        </div>
      </b-col>
      <b-col md="4" offset-md="2">
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
        text-align: left;
        border-bottom: 1px solid $gray-200;
        text-transform: uppercase;
        font-weight: 300;
        vertical-align: bottom;
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
  }
</style>
