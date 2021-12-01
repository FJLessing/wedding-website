<template>
    <div class="booking-form mb-5">
        <b-form class="row booking-form" @submit.stop.prevent>
          <b-col md="4" offset-md="4">
            <b-form-group label="name">
                <b-form-input v-model="booking.name" type="text" required></b-form-input>
            </b-form-group>
            <b-form-group label="guests">
                <b-form-input v-model="booking.people" type="number" required></b-form-input>
            </b-form-group>
            <b-form-group label="email">
                <b-form-input v-model="booking.email" type="email" required></b-form-input>
            </b-form-group>
          </b-col>
          <b-col class="booking-form-options" md="8" offset-md="2">
            <b-form-group label="room type">
                <b-radio-group v-model="booking.roomType" required>
                    <b-radio v-for="roomType in roomTypes" :value="roomType" :key="roomType">{{ roomType }}</b-radio>
                </b-radio-group>
            </b-form-group>
            <b-form-group label="breakfast days">
                <b-checkbox-group v-model="booking.breakfastDays" required>
                    <b-checkbox v-for="breakfastDay in breakfastDays" :value="breakfastDay" :key="breakfastDay">{{ breakfastDay }}</b-checkbox>
                </b-checkbox-group>
            </b-form-group>
          </b-col>
          <b-col md="8" offset-md="2">
            <b-form-group label="message">
                <b-form-textarea v-model="booking.message" rows="3" required></b-form-textarea>
            </b-form-group>
          </b-col>
        </b-form>

        <b-row class="mt-3 d-flex justify-content-center">
            <b-button variant="primary" @click="submit">Submit</b-button>
        </b-row>

    </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'booking-form',
  data () {
    return {
      booking: {
        name: '',
        email: '',
        people: 1,
        message: '',
        room_type: 'tent',
        breakfastDays: []
      },
      roomTypes: [
        'Glamping Tent (R400)',
        'Room (R800)'
      ],
      breakfastDays: [
        'Saturday',
        'Sunday'
      ]
    }
  },
  methods: {
    submit () {
      axios.post('/form/booking-submit.php', this.booking)
        .then(response => {
          this.booking = {
            name: '',
            email: '',
            people: '',
            message: '',
            room_type: []
          };
          this.$bvToast.toast(response.data.message, {
            title: 'Success',
            variant: 'success',
            solid: true,
            appendToast: true,
            autoHideDelay: 3000
          });
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style lang="scss">
.booking-form {
  .form-group {
    margin-top: 2rem;
    margin-bottom: 2rem;
  }
}
.center-vertical {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  align-items: center;
}
</style>
