<template>
    <div class="booking-form mb-5">
        <b-form class="row booking-form" @submit.stop.prevent :validated="formValidation">
          <b-col md="4" offset-md="4">
            <b-form-group label="name">
                <b-form-input v-model="booking.name" type="text" required :state="nameValidation" @blur="() => formNotTouched = false"></b-form-input>
            </b-form-group>
            <b-form-group label="email">
                <b-form-input v-model="booking.email" type="email" required :state="emailValidation" @blur="() => formNotTouched = false"></b-form-input>
            </b-form-group>
            <b-form-group label="guests">
                <b-form-input v-model="booking.people" type="number"></b-form-input>
            </b-form-group>
          </b-col>
          <b-col class="booking-form-options" md="8" offset-md="2">
            <b-form-group label="room type">
                <b-radio-group v-model="booking.roomType">
                    <b-radio v-for="roomType in roomTypes" :value="roomType" :key="roomType">{{ roomType }}</b-radio>
                </b-radio-group>
            </b-form-group>
            <b-form-group label="breakfast days">
                <b-checkbox-group v-model="booking.breakfastDays">
                    <b-checkbox v-for="breakfastDay in breakfastDays" :value="breakfastDay" :key="breakfastDay">{{ breakfastDay }}</b-checkbox>
                </b-checkbox-group>
            </b-form-group>
          </b-col>
          <b-col md="8" offset-md="2">
            <b-form-group label="message">
                <b-form-textarea v-model="booking.message" rows="3"></b-form-textarea>
            </b-form-group>
          </b-col>
        </b-form>

        <b-row>
          <b-alert variant="success" dismissible v-if="formSuccess">
            <p>Thank you for your booking! Louvain will be in touch to sort out the details.</p>
          </b-alert>

          <b-alert variant="danger" dismissible v-if="errors.length">
            <p v-for="error in errors" :key="error">{{ error }}</p>
          </b-alert>
        </b-row>

        <b-row class="mt-3 d-flex justify-content-center">
            <b-button variant="primary" @click="submit" :disabled="!formValidation">Submit</b-button>
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
        roomType: 'none',
        breakfastDays: []
      },
      errors: [],
      formSuccess: false,
      formNotTouched: true,
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
  computed: {
    nameValidation () {
      if (this.formNotTouched) {
        return null;
      }
      return (this.booking.name.length > 0);
    },
    emailValidation () {
      if (this.formNotTouched) {
        return null;
      }
      return (this.booking.email.length > 0) && this.booking.email.includes('@');
    },
    formValidation () {
      if (this.formNotTouched) {
        return null;
      }
      return this.nameValidation && this.emailValidation;
    }
  },
  methods: {
    submit () {
      this.errors = [];

      if (this.formNotTouched) {
        this.errors.push('Please fill in the form.');
        return;
      }

      if (!this.formValidation) {
        this.errors.push('Please check the fields.');
        return;
      }

      axios.post('/forms/booking-submit.php', this.booking)
        .then(response => {
          this.booking = {
            name: '',
            email: '',
            people: '',
            message: '',
            roomType: 'none',
            breakfastDays: []
          };
          this.formSuccess = true;
          this.errors = [];
        })
        .catch(error => {
          console.error(error);
          this.errors.push("Your submission has failed, please try again later.");
          this.$bvToast.toast("There has been an error with your submission, please check the details and try again.", {
            title: 'Failed',
            variant: 'danger',
            solid: true,
            appendToast: true,
            autoHideDelay: 3000
          });
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

  .booking-form-options {
    align-content: center;

    .custom-control-input {
      background-size: cover;
      width: 1.25rem;
      height: 1.25rem;
    }

    .custom-control-label {
      margin-top: 1em;
      line-height: 1.55rem;
      padding-left: .5rem;

      &::before,
      &::after {
        width: 1.25rem;
        height: 1.25rem;
        line-height: 1.25rem;
        margin-right: 1.25rem;
      }
    }
  }
}
.center-vertical {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  align-items: center;
}
</style>
