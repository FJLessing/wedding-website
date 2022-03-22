<template>
  <div class="countdown-timer bg-primary">
    <div v-if="timeLeft.days > 0" class="countdown-slot">
      <span class="countdown-timer-value">{{ timeLeft.days }}</span>
      <span class="countdown-timer-label">Days</span>
    </div>

    <div v-if="timeLeft.days > 0" class="coundown-seperator">:</div>

    <div v-if="timeLeft.hours > 0" class="countdown-slot">
        <span class="countdown-timer-value">{{ timeLeft.hours }}</span>
        <span class="countdown-timer-label">Hours</span>
    </div>

    <div v-if="timeLeft.hours > 0" class="coundown-seperator">:</div>

    <div v-if="timeLeft.minutes > 0" class="countdown-slot">
      <span class="countdown-timer-value">{{ timeLeft.minutes }}</span>
      <span class="countdown-timer-label">Minutes</span>
    </div>

    <div v-if="timeLeft.minutes > 0" class="coundown-seperator">:</div>

    <div class="countdown-slot">
        <span class="countdown-timer-value">{{ timeLeft.seconds || 0 }}</span>
        <span class="countdown-timer-label">Seconds</span>
    </div>

  </div>
</template>

<script>
import moment from 'moment';
export default {
  name: 'site-countdown',
  props: {
    targetDate: {
      type: String,
      default: '2022-03-26 16:00:00'
    }
  },

  data () {
    return {
      endTime: null,
      timeLeft: {}
    };
  },

  methods: {
    updateTimeLeft () {
      this.timeLeft = this.calculateTimeLeft(this.endTime);
    },

    calculateTimeLeft (endTime) {
      const diff = moment.duration(moment(endTime).diff(moment()));
      return {
        days: diff.asDays().toFixed(0),
        hours: diff.hours(),
        minutes: diff.minutes(),
        seconds: diff.seconds()
      };
    }
  },

  mounted () {
    this.endTime = moment(this.targetDate);
    this.updateTimeLeft();
    setInterval(this.updateTimeLeft, 1000);
  }
}
</script>
<style lang="scss">
  @import '@/styles/common/_bootstrap-variables.scss';

  .countdown-timer {
      display: flex;
      flex-direction: row;
      justify-content: center;
      padding: 2em 3em;
      font-weight: thin;

      .countdown-timer-value,
      .coundown-seperator {
        font-family: 'Moon', 'Muli', sans-serif;
          font-size: 2em;
          line-height: .75em;
          color: $gray-200;
      }

      .countdown-timer-value {
          margin-bottom: 0em;
      }

      .countdown-timer-label {
          font-size: .75em;
          color: $gray-200;
          margin-top: 0em;
      }

      .countdown-slot {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: flex-end;
          margin: 0 .4em;
      }
  }
</style>
